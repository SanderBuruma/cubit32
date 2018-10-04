/*
project: unrealistic pseudo simulation of atoms
by SanderBuruma (SanderBuruma@GMail.com) AKA Cubit32
*/

const canvasWidth  = window.innerWidth 
const canvasHeight = window.innerHeight-5 
const G = 7e-3, //G  = gravitational constant
      G2 = 3e-0, //G2 = repelling constant
      atomRConst = 3, //atomRConst = scale of atoms
 			atomProtonExp = 2, //exponent which influences repulsion
 			constDampening = 1e-3 //the fraction  by which velocity is dampened every frame
let atoms = [] //the array of atoms where all the information about individual atoms will be stored and changed
let debugLog = '' //for manipulating and logging to console at appropriate times
let minAtoms = 400 //start spawning atoms randomly if there are fewer than this nr of atoms
let minAtomsSpread = 1e3
let gameSpeed = 0.5

function setup(){
  createCanvas(canvasWidth,canvasHeight);
}

function atom(protons,neutrons,velX,velY,x,y){//assigns the attributes to a new atom
  this.pos = [x,y]
  this.vel = [velX,velY]
  this.protons = protons
  this.neutrons = neutrons
  this.mass = this.protons+this.neutrons
  this.collision = false
  this.color = color(random(128,255),random(128,255),random(128,255))
}

function logUniverseProperties(){
  let a = 0
  for (i in atoms){a+= atoms[i].mass}
  debugLog += `There is ${a} mass and there are ${atoms.length} atoms in the universe. `
}

function gaussRandom(h,dontCentre){//h for the maximum range of nr // dontCentre optional: if true then don't centre the gaussian curve on 0 // distributed roughly according to the gaussian curve
  let nr = 0
  let j = 10
  for (let i = 0; i< j; i++){
    nr+= random(h/j)
  }
  if (dontCentre===true){return nr}
  return nr-h*0.5
}


function calcDistance(x1,y1,x2,y2){//returns the distance between 2 objects in 2D space
  let k = Math.abs(x1-x2),
      j = Math.abs(y1-y2)
  return Math.sqrt(Math.pow(k,2)+Math.pow(j,2))
}

function mouseDragged (){
  newAtomCreation(mouseX,mouseY)
}

function newAtomCreation(x,y){
  for (let i=0;i<atoms.length;i++){
      let distance = calcDistance(atoms[i].pos[0],atoms[i].pos[1],x,y)
      let atom1Radius = Math.sqrt(atoms[i].mass)*atomRConst
      let atom2Radius = 1*atomRConst
      if (distance/4<atom2Radius+atom1Radius){return}
  }
  atoms[atoms.length] = new atom(1,1,gaussRandom(0.05)*gameSpeed,gaussRandom(0.05)*gameSpeed,x,y) 
  console.log(`New atom:${atoms.length-1} xy velocities: ${atoms[atoms.length-1].vel[0]},${atoms[atoms.length-1].vel[1]}. `)
}

function onkeydown(a){
  console.log('a')
}

function draw(){
  if (atoms.length < minAtoms){
    newAtomCreation(random(-minAtomsSpread+canvasWidth/ 2,minAtomsSpread+canvasWidth /2),
                    random(-minAtomsSpread+canvasHeight/2,minAtomsSpread+canvasHeight/2))
  }
  let collidingAtoms = 0
  if (mouseY < canvasHeight / 15)     {for (let i in atoms){atoms[i].pos[1] += (canvasHeight/15-mouseY)               /3}}
  if (mouseY > canvasHeight * 14 / 15){for (let i in atoms){atoms[i].pos[1] -= (canvasHeight/15-(canvasHeight-mouseY))/3}}
  if (mouseX < canvasWidth / 15)      {for (let i in atoms){atoms[i].pos[0] += (canvasWidth /15-mouseX)               /3}}
  if (mouseX > canvasWidth * 14 / 15) {for (let i in atoms){atoms[i].pos[0] -= (canvasWidth /15-(canvasWidth-mouseX)) /3}}
  background(255,255,255)
  debugLog = ''
  //for (let i=0;i<atoms.length;i++){atoms[i].collision = false}
  for (let i=0;i<atoms.length;i++){ //check all atoms against each other through iteration // this has n^2 complexity
    atoms[i].vel[0]-= atoms[i].vel[0]*constDampening*gameSpeed
    atoms[i].vel[1]-= atoms[i].vel[1]*constDampening*gameSpeed
    for (let j=0;j<atoms.length;j++){
      let acceleration = 0
      if (i!==j && !atoms[j].collision && !atoms[i].collision){
        let distance = calcDistance(atoms[i].pos[0],atoms[i].pos[1],atoms[j].pos[0],atoms[j].pos[1])
        let atom1Radius = Math.sqrt(atoms[i].mass)*atomRConst
        let atom2Radius = Math.sqrt(atoms[j].mass)*atomRConst
        if (distance*2<atom2Radius+atom1Radius){//for collision merge atoms by averaging out velocities, positions, etc
          atoms[i].vel[0] = (atoms[i].mass*atoms[i].vel[0]+atoms[j].mass*atoms[j].vel[0])/(atoms[i].mass+atoms[j].mass)
          atoms[i].vel[1] = (atoms[i].mass*atoms[i].vel[1]+atoms[j].mass*atoms[j].vel[1])/(atoms[i].mass+atoms[j].mass)
          atoms[i].pos[0] = (atoms[i].mass*atoms[i].pos[0]+atoms[j].mass*atoms[j].pos[0])/(atoms[i].mass+atoms[j].mass)
          atoms[i].pos[1] = (atoms[i].mass*atoms[i].pos[1]+atoms[j].mass*atoms[j].pos[1])/(atoms[i].mass+atoms[j].mass)
          atoms[i].neutrons += atoms[j].neutrons
          atoms[i].protons  += atoms[j].protons
          atoms[i].mass     += atoms[j].mass
          atoms[j].collision = true //right now no more than 1 collision per frame can be processed
          collidingAtoms++
          debugLog += `Atom ${j} colliding with ${i}. `
        }
        let distanceX = atoms[i].pos[0]-atoms[j].pos[0]
        let distanceY = atoms[i].pos[1]-atoms[j].pos[1]
        acceleration = (atoms[j].neutrons*G) / Math.pow(distance,2) - /*GM/r^2 = m/s^2*/
          (Math.pow/*this is a random fudge factor*/(atoms[j].protons,atomProtonExp)*G2)/Math.pow(distance,4) /*similar to above but r^4*/
        atoms[i].vel[0] += distanceX*acceleration*gameSpeed/distance
        atoms[i].vel[1] += distanceY*acceleration*gameSpeed/distance
      }
      for (let j=0;j<2;j++){atoms[i].pos[j] -= atoms[i].vel[j]*gameSpeed}//update position
    }
    let atomRadius = Math.pow(atoms[i].mass,(1/2))*atomRConst
    fill(atoms[i].color); strokeWeight(Math.cbrt(atoms[i].mass)*0.707); ellipse(atoms[i].pos[0],atoms[i].pos[1],atomRadius,atomRadius)//draw atoms
    for (let i=0;i<atoms.length;i++){
      if (atoms[i].collision){
        debugLog += `Atom ${i} is being deleted due to collision; mass: ${atoms[i].mass}. `
        atoms.splice(i,1)
        logUniverseProperties()
        break
      }
      if (Math.abs(atoms[i].pos[0])>1e5||Math.abs(atoms[i].pos[1])>1e5){
        debugLog += `Atom ${i} is being deleted due to distance; mass: ${atoms[i].mass}. `
        atoms.splice(i,1)
        logUniverseProperties()
        break
      }
    }
  }
  console.log(debugLog)
}