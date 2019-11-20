/**the snake Board, with the snake at the center
 *
 * A simple Dictionary class for Strings.
 *
 * @class Board
 * @param {integer} height determines the tile height
 * @param {integer} width determines the tile width
 *
 */
class Board{
  constructor(height, width)
  {
    this.height = height;
    this.width = width;
    this.snakeHead = [Math.floor(width/2),Math.floor(width/2)];
    this.food = [0,0];
    this.tail = [];
  }
}