
const canvasWidth  = window.innerWidth 
const canvasHeight = window.innerHeight-5 
let gridWidth = 24,
    gridHeight = 12
function setup() {
  createCanvas(canvasWidth,canvasHeight);
}

var hex = function (x,y){
  this.hexRadius = 32
  this.centerX = this.hexRadius*2*0.75*(1.5+x)
  this.centerY = this.hexRadius*2*0.866*(1.5+y+0.5*((x+1)%2))
  this.draw = function (i,j){
    //console.log(`drawing ${x},${y}`)
    strokeWeight(1)
    stroke(181)
    fill(color(i/gridWidth*75+180,j/gridHeight*75+180,255))
    //rect(this.centerX,this.centerY,this.hexRadius,this.hexRadius)
    beginShape()
    vertex(this.centerX+0.5*this.hexRadius,   this.centerY+0.866*this.hexRadius)
    vertex(this.centerX-0.5*this.hexRadius,   this.centerY+0.866*this.hexRadius)
    vertex(this.centerX-1*  this.hexRadius,   this.centerY)
    vertex(this.centerX-0.5*this.hexRadius,   this.centerY-0.866*this.hexRadius)
    vertex(this.centerX+0.5*this.hexRadius,   this.centerY-0.866*this.hexRadius)
    vertex(this.centerX+1*  this.hexRadius,   this.centerY)
    endShape(CLOSE)
  }
}
var hexGrid = []
for (var i = 0; i < gridHeight; i++){
  hexGrid[i] = []
  for (var j = 0; j < gridWidth; j++){
    hexGrid[i][j] = new hex(j,i)
  }
}

function draw() {
  for (let i in hexGrid){
    for (let j in hexGrid[i]){
      hexGrid[i][j].draw(i,j)
    }
  }
}