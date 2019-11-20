/*
project: unrealistic pseudo simulation of atoms
by SanderBuruma (SanderBuruma@GMail.com) AKA Cubit32
*/
import * as myModule from '/modules/my-module.js';

const canvasWidth  = window.innerWidth;
const canvasHeight = window.innerHeight-5;
function setup(){
  createCanvas(canvasWidth,canvasHeight);
}

function gaussRandom(h,dontCentre){//h for the maximum range of nr // dontCentre optional: if true then don't centre the gaussian curve on 0 // distributed roughly according to the gaussian curve
  let nr = 0;
  let j = 10;
  for (let i = 0; i < j; i++){
    nr+= random(h/j)
  }
  if (dontCentre){return nr};
  return nr-h * 0.5;
}


function mouseDragged (){
}

function onkeydown(a){
  console.log('a');
}

function draw(){
}