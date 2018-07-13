let oldDate = +new Date(),
    primesArr = [2,3],
    nrToCheck = primesArr[1]+2

while (+new Date() - oldDate < 1e3*60*45){
    let nrToCheckSqrt = (nrToCheck**.5)
    for (let i in primesArr){
        if (primesArr[i] > nrToCheckSqrt){
            primesArr.push(nrToCheck)
            console.log (`${nrToCheck} prime ${primesArr[primesArr.length-1]-primesArr[primesArr.length-2]}`)
            break
        }
        if (nrToCheck%primesArr[i]===0){
            //console.log(`${nrToCheck} not prime ${primesArr[i]}`)
            break
        }
    }
    nrToCheck+=2
}
console.log (`${nrToCheck} prime ${primesArr[primesArr.length-1]-primesArr[primesArr.length-2]}`)