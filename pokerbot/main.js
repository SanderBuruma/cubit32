let cardSuits = ["clubs","spades","hearts","diamonds"],
  cardDeck = [], //0 to 12 are clubs, 13 to 25 are spades, 26 to 38 are hearts, 39 to 51 are diamonds. the Aces are 12, 25, 38, 51.
  cardSuitsArt = ["svg/card-club.svg","svg/card-spade.svg","svg/card-heart.svg","svg/card-diamond.svg"], 
cardRanksSymbols = ["2","3","4","5","6","7","8","9","10","J","Q","K","A"], 
cardRankNames = ["deuce","trey","four","five","six","seven","eight","nine","ten","jack","queen","king","ace"];


function newHand(){

  //clear board
  while (document.getElementsByClassName('playing-card').length > 0){
    let temp = document.getElementsByClassName('playing-card')[0];
    destroyElelement( temp )
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
    let randoVar = Math.floor(Math.random()*tempDeck.length);
    returnDeck.push(tempDeck.splice(randoVar,1)[0]);
  }
  return returnDeck;
}

function createCard(cardNum){
  console.log(cardNum);
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

function getHandValue(cards){//cards must be a cards array of the card numbers of 5+ cards

  //the first return value will be 9 for royal flush, 8 for straight flush, 7 for four of a kind, etc
  //the second is hand strength used to tiebreak against hands of the same type but which are of lower strength (ie, A hi flush vs 5 hi flush)
  //the third is an array of the 5 cards that determine hand strength
  //the fourth is the name of the hand value
  let returnCards = [];
  let count = 0, handStr = 0;

  //straightflush or royal flush WIP
  //still needs to become able to find the 5 hi str flush
  let suitsCount = [0,0,0,0];
  for (i in cards){
    suitsCount[getSuit(i)]++;
  }
  for (i in suitsCount){
    if (suitsCount[i] > 4){//more than 4 of a suit, so there is a flush
      let flushCards = [];
      for (j in cards){
        if (getSuit(j) == i){
          flushCards.append(j); //fill array
        }
      }
      flushCards.sort((a,b)=>b-a);//sort descending flushcard array to check whether there are 5 consecutive cards
      let consecCount = 0; //counting variable to count consecutive cards
      for (let i=0 ; i<flushCards.length-1 ; i++){
        if (flushCards[i] > flushCards[i+1]+1){
          consecCount++;
          if (consecCount > 3){ //add one to the count at the same time it checks whether there are 5 consecutive cards
            //straight or royal flush found
            for (let k=0; k<5 ; k++){returnCards.append(flushCards[k])}
            if (flushCards[0]%13){
              return [9,0,returnCards,"Royal Flush"]
            }
            return [8,getRank(returnCards[0]),returnCards,"Straight Flush! "+cardRankNames[getRank(returnCards[0])]+" high"];
          }
        } else {consecCount=0}
      }
    }
  }

  //four of a kind
  let ranksCount = [0,0,0,0,0,0,0,0,0,0,0,0,0];
  for (i in cards){
    ranksCount[getRank(i)]++
    if (ranksCount[getRank(i)]=4) {//found 4 of a kind
      
      //determine kicker
      let kickerCardArray = [];
      for (j in cards){
        if (j != i){
          kickerCardArray.push(j);
        }
        kickerCardArray.sort((a,b) => b-a);
      }
      for (j in cards){
        if (getRank(j) == i){
          returnCards.push(j);
        }
      }
      returnCards.push(kickerCardArray[0]);
      return [7,getRank(i)*13+getRank(kickerCardArray[0]),returnCards,cardRankNames[getRank(i)]+"s Four of a Kind! " + cardRankNames[getRank(kickerCardArray[0])] +" kicker"];
    }
  }

  //full house
  //re-uses the ranksCount from the 4 of a kind
  for (let i=12 ; i>-1 ; i--){//looking for 3 of a kind
    if (ranksCount[i]=3){
      for (let j=12 ; i>-1 ; i--){//looking for the 2 inside cards
        if (ranksCount[i]=2){//found the full house
          for (k in cards){
            if (getRank(k)==i || getRank(k)==j){
              returnCards.append(k);
            }
          }
          return [6,i*13+j,returnCards,cardRankNames[i]+"s full of "+cardRankNames[j]+"s"];
        }
      }
    }
  }

  //flush
  for (i in suitsCount){
    if (suitsCount[i] > 4){
      let flushCards = [];
      for (j in cards){
        let count = 5;
        if (getSuit(j) == i && count > 0){
          count--;
          flushCards.append(j);
        }
        flushCards.sort((a,b)=>b-a);
        let powerNr = 6, handStr = 0; 
        count = 5;
        for (i in flushCards){
          if (count > 0){
            handStr += Math.pow(getRank(i),powerNr); //this power calculation is required to prevent a JQs high flush from beating a K2s high flush
            powerNr--; count--;
          }
        }
        return [5,handStr,flushCards," Flush"]
      }
    }
  }

  //straight
  //still needs to become able to find the 5 hi str flush
  let consecCount = 0;
  for (let i=12 ; i>0 ; i--){
    if (ranksCount[i] && ranksCount[i-1]){//consecutive card found
      consecCount++;
      if (consecCount>3){//straight found
        for (j in cards){
          if(getRank(j) <= i+3 && getRank(j)>= i-1){
            returnCards.append(j);
          }
        }
        return [4,i,returnCards,cardRankNames[i+3]+" high Straight!"]
      }
    } else {consecCount=0}
  }

  //the last 3 hand types need the cards argument to be sorted in descending order according to rank
  cards.sort((a,b)=>getRank(b)-getRank(a));

  //three of a kind
  for (let i=12 ; i>=0 ; i--){
    if (ranksCount[i]==3){//found 3 of a kind
      
      for (j in cards){
        if (getRank(j)==i){
          returnCards.append(j);
        }
      }
      //find kickers
      count = 2;
      for (j in cards){
        if (getRank(j)!=i && count > 0){
          returnCards.append(j);
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
          for (k in cards){
            if (getRank(k)!=i && getRank(k)!=j){//found the kicker
              let handStr = getRank(k)+i*169+j*13; 
              returnCards.append(k);
              break;
            }
          }
          count = 4;
          while (count>0){
            let temp = cards.pop();
            if (getRank(temp)==i || getRank(temp)==j){
              returnCards.append(temp);
              count--;
            }
          }
          return [2,handStr,returnCards,cardRankNames[i]+"s and "+cardRankNames[j]+"s"];
        }
      }
    }
  }

  //one pair
  for (let i=12 ; i>=0 ; i--){
    if (ranksCount[i]==2){//found a pair
      for (j in cards){
        if (getRank(j)==i){
          returnCards.append(j);
        }
      }
      count = 3, handStr = 0;
      while (count>0){
        let temp = cards.pop();
        if (getRank(temp)!=i){
          returnCards.append(temp);
          handStr+=getRank(temp)**count;
          count--;
        }
      }
      return [1,handStr,returnCards,"one pair, "+cardRankNames[i]+"s"]
    }
  }

  //high cards AKA air
  let highCards = "";
  for (let i=5; i>=0 ; i--){
    temp = cards.pop();
    returnCards.append(temp);
    handStr+= getRank(temp)*13**i;
    highCards += cardRanksSymbols[getRank(temp)];
  }
  return [0,handStr,returnCards,"high cards: "+highCards];

}

function getSuit(card){
  return Math.floor(card/13);
}
function getRank(card){
  return card%13;
}