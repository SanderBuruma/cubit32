let cardSuits = ["clubs","spades","hearts","diamonds"],
  cardDeck = [], //0 to 12 are clubs, 13 to 25 are spades, 26 to 38 are hearts, 39 to 51 are diamonds. the Aces are 12, 25, 38, 51.
  cardSuitsArt = ["svg/card-club.svg","svg/card-spade.svg","svg/card-heart.svg","svg/card-diamond.svg"], 
cardRanksSymbols = ["2","3","4","5","6","7","8","9","10","J","Q","K","A"], cardRankNames = ["deuce","trey","four","five","six","seven","eight","nine","ten","jack","queen","king","ace"];


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

function getHandValue(cards){

  //straightflush
  let suitsCount = [0,0,0,0];
  for (i in cards){
    suitsCount[getSuit(i)]++;
  }
  for (i in suitsCount){
    if (suitsCount[i] > 4){
      let flushCards = [];
      for (j in cards){
        if (getSuit(j) == i){
          flushCards.append(j);
        }
      }
    }
  }

  //four of a kind

  //full house

  //flush
  for (i in suitsCount){
    if (suitsCount[i] > 4){
      let flushCards = [];
      for (j in cards){
        if (getSuit(j) == i){
          flushCards.append(j);
        }
      }
    }
  }

  //straight

  //three of a kind

  //two pair

  //one pair

  //high cards

}

function getSuit(card){
  return Math.floor(card/13);
}
function getRank(card){
  return card%13;
}