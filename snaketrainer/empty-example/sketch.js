/*
a snake game where a neural net learns to play the game.
by Sander Buruma (SanderBuruma@GMail.com) AKA Cubit32
*/

/** a sort of enum. I do realize there are other ways to do this which don't generate namespace issues, but this is a small project. I don't think I'll run into huge problems with it. Please accept my excuse.
 */
let up = 1,
  right = 2,
  down = 3,
  left = 0;

/**the snake Board, with the snake at the center
 * There is 1 snake, 1 piece of food and basically any number of tail pieces.
 * The food piece respawns every time the snake eats it.
 * There are no walls.
 *
 * @class Board
 * @param {number} height determines the height in number of tiles
 * @param {number} width determines the width in number of tiles
 *
 */
class SnakeBoard {
  constructor(height, width) {
    this.height = height;
    this.width = width;
    this.snakeHead = [Math.floor(width / 2), Math.floor(height / 2)];
    this.food = [0, 0];
    /**2d array of tail pieces with xy coordinates */
    this.tail = [[Math.floor(width / 2), Math.floor(height / 2)]];
    this.snakeDirection = up;
    /**a type of timekeeper, used to calculate the final score. */
    this.turn = 0;
  }

  /**progresses the board by 1 turn. */
  progress() {
    this.tail[0] = this.snakehead;
    switch (d) {
      case left:
        this.snakehead[0] -= 1;
        if (this.snakehead[0] < 0) this.snakehead[0] += this.width;
        break;
      case up:
        this.snakehead[1] -= 1;
        if (this.snakehead[1] < 0) this.snakehead[1] += this.height;
        break;
      case right:
        this.snakehead[0] += 1;
        this.snakehead[0] %= this.width;
        break;
      case down:
        this.snakehead[1] += 1;
        this.snakehead[1] %= this.height;
        break;
    }

    if (this.snakehead == this.food) {
      this.respawnFood();
      this.tail.push([0, 0]);
    }

    for (let i = 1; i < this.tail.length; i++) {
      this.tail[i] = this.tail[i - 1];
    }
  }

  /** +1 is clockwise, -1 anticlockwise
   * @param {number} change changes the direction, should be +1 or -1
   */
  changeDirection(change) {
    this.direction += change;
    this.direction %= 4;
  }

  /**respawns the food piece and keeps trying to find a vacant home for it until the cows come home. */
  respawnFood() {
    while (true) {
      this.food = [
        floor(gaussRandom(this.width, true, 3)),
        floor(gaussRandom(this.height, true, 3))
      ];

      let foundSpot = true;
      foreach(t in this.tail);
      {
        if (t == this.food) {
          foundSpot = false;
          break;
        }
      }
      if (this.food == this.snakeHead) {
        foundSpot = false;
      }
      if (foundSpot) break;
    }
  }
}

let snakeBoard = new SnakeBoard(20, 20);
const canvasWidth = window.innerWidth;
const canvasHeight = window.innerHeight - 5;

/**generates a random number
 * @param {number} range the possible range of the gaussion number
 * @param {boolean} dontCentre whether or not the number will be centered on 0.
 * @param {number} gaussionAccuracy an integer number. By default 10. The higher, the more accurate but also the more expensive computationally.
 */
function gaussRandom(range, dontCentre, gaussionAccuracy = 10) {
  let nr = 0;
  for (let i = 0; i < gaussionAccuracy; i++) {
    nr += random(range / gaussionAccuracy);
  }
  if (dontCentre) {
    return nr;
  }
  return nr - range * 0.5;
}

function mouseDragged() {}

function keyPressed(a) {
  console.log(a);
}

function setup() {
  createCanvas(canvasWidth, canvasHeight);
}

function draw() {}
