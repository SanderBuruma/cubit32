let primes = Array(2);
let curNr = 3;
function calcPrimes(){
  let checkNr = 0;
  while(curNr**.5 > primes[checkNr]){
    if (curNr%primes[checkNr]){
      return;
    }
    checkNr++;
  }
  primes.push(curNr);
  console.log(curNr);
  curNr += 2;
}
setInterval(calcPrimes,100);