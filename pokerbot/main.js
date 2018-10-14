let cardSuitsNames = ["Clubs","Spades","Hearts","Diamonds"],
  cardDeck = [], //0 to 12 are clubs, 13 to 25 are spades, 26 to 38 are hearts, 39 to 51 are diamonds. the Aces are 12, 25, 38, 51.
  cardSuitsArt = ["svg/card-club.svg","svg/card-spade.svg","svg/card-heart.svg","svg/card-diamond.svg"], 
cardRanksSymbols = ["2","3","4","5","6","7","8","9","10","J","Q","K","A"], 
cardRankNames = ["Deuce","Trey","Four","Five","Sixe","Seven","Eight","Nine","Ten","Jack","Queen","King","Ace"];


function newHand(){

  //clear board
  while (document.getElementsByClassName('playing-card').length > 0){
    let temp = document.getElementsByClassName('playing-card')[0];
    destroyElelement(temp)
  }

  //reshuffle deck
  cardDeck = randomDeck();

  //display 2 cards for each player and 5 on the board
  for (let i=0 ; i<2 ; i++){
    document.getElementById('player1').append(createCard(cardDeck[i]));
  }
  for (let i=2 ; i<4 ; i++){
    document.getElementById('player2').append(createCard(cardDeck[i]));
  }
  for (let i=4 ; i<9 ; i++){
    document.getElementById('board').append(createCard(cardDeck[i]));
  }

  //display final hand strength for both players
  let player1hand = [];
  for (let i = 0; i<2 ; i++){
    player1hand.push(cardDeck[i]);
  }
  for (let i = 4; i<9 ; i++){
    player1hand.push(cardDeck[i]);
  }
  console.log(player1hand)
  player1hand = getHandValue(player1hand);
  let player2hand = cardDeck.slice(2,9);
  console.log(player2hand)
  player2hand = getHandValue(player2hand);

  let winningHand = getWinningHand(player1hand,player2hand);
  document.getElementById('player1handtext').innerHTML = player1hand[3];
  document.getElementById('player2handtext').innerHTML = player2hand[3];
  document.getElementById('player1textspan').classList.remove('green');
  document.getElementById('player2textspan').classList.remove('green');
  if (winningHand == 2){
    document.getElementById('player2textspan').classList.add('green');
    for (i of player2hand[2]){
      document.getElementById('card'+i).classList.add('card-won');
    }
  } else if (winningHand){
    document.getElementById('player1textspan').classList.add('green'); 
    for (i of player1hand[2]){
      document.getElementById('card'+i).classList.add('card-won');
    }
  } else {//draw

  }
}

function destroyElelement(elem){
  elem.parentNode.removeChild(elem);
}

function randomDeck(){
  let tempDeck = [], returnDeck = [];
  for (let i=0 ; i<52 ; i++){
    tempDeck.push(i);
  }
  while (tempDeck.length){
    let randomVar = Math.floor(Math.random()*tempDeck.length);
    returnDeck.push(tempDeck.splice(randomVar,1)[0]);
  }
  return returnDeck;
}

function createCard(cardNum){
  let card = document.createElement('div');
  card.classList.add('playing-card');
  card.id = "card"+cardNum;
  let suitNum = getSuit(cardNum);
  if (suitNum > 2){
    card.style='color: #00f;';
  } else if (suitNum > 1) {
    card.style='color: #f00;';
  } else if (suitNum > 0) {
    card.style='color: #000;';
  } else {
    card.style='color: #080;';
  }

  let cardRankSymbol = document.createElement('p');
  cardRankSymbol.innerHTML = cardRanksSymbols[getRank(cardNum)]+"\n";
  card.append(cardRankSymbol);

  let cardSuitImg = document.createElement('img');
  cardSuitImg.src = cardSuitsArt[getSuit(cardNum)];
  
  card.append(cardSuitImg);
  return card;
}

function getHandValue(cards){//cards must be an array of the card numbers of 5+ cards
  if (cards.length<5){
    console.log('getHandValue() did not receive an array of length > 4')
    console.log(cards);
  }

  //the first return value will be 9 for royal flush, 8 for straight flush, 7 for four of a kind, etc
  //the second is hand strength used to tiebreak against hands of the same type but which are of lower strength (ie, A hi flush vs 5 hi flush)
  //the third is an array of the 5 cards that determine hand strength
  //the fourth is the name of the hand value
  let returnCards = [];
  let count = 0, handStr = 0, consecCount = 0;

  //still needs to become able to find the 5 hi str flush
  let suitsCount = [0,0,0,0];
  let ranksCount = [0,0,0,0,0,0,0,0,0,0,0,0,0];
  console.log("cards: "+cards);
  for (i of cards){
    suitsCount[getSuit(i)]++;
    ranksCount[getRank(i)]++;
  }
  console.log("suitsCount: "+suitsCount);
  console.log("ranksCount: "+ranksCount);

  //straightflush or royal flush WIP
  count=0;
  for (i of suitsCount){
    if (suitsCount[i] > 4){//more than 4 of a suit, so there is a flush
      let suitRanksCount = [0,0,0,0,0,0,0,0,0,0,0,0,0];
      for (j of cards){
        if (getSuit(j) == i){
          suitRanksCount[getRank(j)]++;
        }
        for (let k=12 ; k>0 ; k--){
          let fiveHighStrFlush = false;
          if (suitRanksCount[k] && suitRanksCount[k-1]){//consecutive card found
            consecCount++; 

            if (consecCount>3){//strflush found
              for (l of cards){
                if (getRank(l) <= k+3 || getRank(l) >= k-1 || (getRank(l)==12 && fiveHighStrFlush)){
                  returnCards.push(l);
                }
              }
              if (fiveHighStrFlush){
                return ([8,k+3,returnCards,cardRankNames[3]+" high Straight Flush!!"])
              } else if (k+3 == 12){
                return ([9,0,returnCards,"Royal Flush!!!"])
              }
              return ([8,k+3,returnCards,cardRankNames[k+3]+" high Straight Flush!!"])
            }

            //checks to see if there is a possible five high straight flush
            if(k==1 && suitRanksCount[12] && suitRanksCount[0] && suitRanksCount[1] && suitRanksCount[2] && suitRanksCount[3]){
              consecCount++;
              fiveHighStrFlush=true;
            }
            if (consecCount>3){//strflush found
              for (l of cards){
                if (getRank(l) <= k+3 || getRank(l) >= k-1 || (getRank(l)==12 && fiveHighStrFlush)){
                  returnCards.push(l);
                }
              }
              if (fiveHighStrFlush){
                return ([8,k+3,returnCards,cardRankNames[3]+" high Straight Flush!!"])
              } else if (k+3 == 12){
                return ([9,0,returnCards,"Royal Flush!!!"])
              }
              return ([8,k+3,returnCards,cardRankNames[k+3]+" high Straight Flush!!"])
            }

          } else {consecCount=0}
        }
      }
    }
    count++;
  }

  //four of a kind
  //needs to add the four relevant cards to returnCards
  for (let i=12 ; i>=0 ; i--){
    if (ranksCount[getRank(i)]==4) {//found 4 of a kind
      
      //determine kicker
      let kickerCardArray = [];
      for (j of cards){
        if (getRank(j) != i){
          kickerCardArray.push(j);
        }
        kickerCardArray.sort((a,b) => getRank(b)-getRank(a));
      }
      for (j of cards){
        if (getRank(j) == i){
          returnCards.push(j);
        }
      }
      returnCards.push(kickerCardArray[0]);
      return [7,i*13+getRank(kickerCardArray[0]),returnCards,cardRankNames[getRank(i)]+"s Four of a Kind! " + cardRankNames[getRank(kickerCardArray[0])] +" kicker"];
    }
  }

  //full house
  //re-uses the ranksCount from the 4 of a kind
  for (let i=12 ; i>-1 ; i--){//looking for 3 of a kind
    if (ranksCount[i]==3){
      console.log(ranksCount[i]+" "+i)
      for (let j=12 ; j>-1 ; j--){//looking for the 2 inside cards
        if (ranksCount[j]==2){//found em
          console.log(ranksCount[j]+" "+j)
          for (k of cards){
            if (getRank(k)==i || getRank(k)==j){
              returnCards.push(k);
            }
          }
          return [6,i*13+j,returnCards,cardRankNames[i]+"s full of "+cardRankNames[j]+"s"];
        }
      }
    }
  }

  //flush
  for (i in suitsCount){
    if (suitsCount[i] > 4){//found a flush
      let flushCards = [];
      for (j of cards){
        if(getSuit(j)==i){
          flushCards.push(j);
        }
      }
      flushCards.sort((a,b)=>getRank(b)-getRank(a));
      returnCards = flushCards.slice(0,5);
      count = 5; while (count > 0){
        let temp = flushCards.pop();
        handStr += getRank(temp)*13**count;
        count--;}
      return [5,handStr,returnCards,cardRankNames[getRank(returnCards[0])]+" high Flush"];
    }
  }

  //straight
  //should be able to find the 5 hi straight
  for (let i=12 ; i>0 ; i--){
    if(ranksCount[i] && ranksCount[i-1]){//consecutive card found
      consecCount++;
      if(consecCount>3){//straight found
        for (j of cards){
          if(getRank(j) <= i+3 && getRank(j) >= i-1){
            returnCards.push(j);
          }
        }
        return [4,i,returnCards,cardRankNames[i+3]+" high Straight!"]
      }

      if (i == 1 && ranksCount[0] && ranksCount[1] && ranksCount[2] && ranksCount[3] && ranksCount[12]){
        if(consecCount>2){//5 high straight found
          for (j of cards){
            if((getRank(j) <= i+3 && getRank(j) >= i-1) || getRank(j) == 12){
              returnCards.push(j);
            }
          }
          return [4,0,returnCards,cardRankNames[3]+" high Straight!"]
        }
      }
    } else {consecCount=0}
  }

  //the last 3 hand types need the cards argument to be sorted in descending order according to rank
  cards.sort((a,b)=>getRank(a)-getRank(b));

  //three of a kind
  for (let i=12 ; i>=0 ; i--){
    if (ranksCount[i]==3){//found 3 of a kind
      cards.reverse();//reverse sort
      for (j of cards){
        if (getRank(j)==i){
          returnCards.push(j);
        }
      }
      //find kickers
      count = 2;
      for (j of cards){
        if (getRank(j)!=i && count > 0){
          handStr += getRank(j)*13**count;
          returnCards.push(j);
          count--;
        }
      }
      handStr = getRank(returnCards[3])**2+getRank(returnCards[2]);
      return [3,handStr,returnCards,"Three of a kind, "+cardRankNames[i]+"s"]
    }
  }

  //two pair
  for (let i=12 ; i>=0 ; i--){
    if (ranksCount[i]==2){//found a pair
      for (let j=12 ; j>=0 ; j--){
        if (ranksCount[j]==2 && i!=j){//found two pair
          cards.reverse();//sort ascending
          for (k of cards){
            if (getRank(k)!=i && getRank(k)!=j){//found the kicker
              handStr = getRank(k)+i*169+j*13; 
              returnCards.push(k);
              break;
            }
          }
          count = 4;
          while (count>0){
            let temp = cards.pop();
            if (getRank(temp)==i || getRank(temp)==j){
              returnCards.push(temp);
              count--;
            }
          }
          return [2,handStr,returnCards,"Two pair, "+cardRankNames[i]+"s and "+cardRankNames[j]+"s"];
        }
      }
    }
  }

  //one pair
  for (let i=12 ; i>=0 ; i--){
    if (ranksCount[i]==2){//found a pair
      for (j of cards){
        if (getRank(j)==i){
          returnCards.push(j);
        }
      }
      count = 3, handStr = 0;
      handStr += i*13**4;
      while (count>0){
        let temp = cards.pop();
        if (getRank(temp)!=i){
          returnCards.push(temp);
          handStr+=getRank(temp)**count;
          count--;
        }
      }
      return [1,handStr,returnCards,"One pair, "+cardRankNames[i]+"s"]
    }
  }

  //high cards AKA air
  let highCards = "";
  for (let i=4; i>=0 ; i--){
    temp = cards.pop();
    returnCards.push(temp);
    handStr+= getRank(temp)*13**i;
    highCards += " "+cardRanksSymbols[getRank(temp)];
  }
  return [0,handStr,returnCards,"High cards: "+highCards];

}

function getWinningHand(hand1,hand2){
  if (hand1[0] > hand2[0]){
      return 1;
  } else if (hand1[0] < hand2[0]){
      return 2;
  } else {
    if (hand1[1] > hand2[1]){
      return 1;
    } else if (hand1[1] < hand2[1]){
      return 2;
    } else {
      return 0;
    }
  }
}

function getSuit(card){
  return Math.floor(card/13);
}
function getRank(card){
  return card%13;
}