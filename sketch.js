function _(x){
  return (document.getElementById(x));
}

var canvas = _('myCanvas');
var ctx = canvas.getContext("2d");
var innerWidth = 1500;
var innerHeight = 1000;
var move = 10;

var ship = {},
ship_img = new Image();
ship_img.src = 'imgs/F5S1/03.png';

function drawGrid(){
  ctx.lineWidth = 0.5;
  ctx.strokeStyle = 'gray';
  ctx.beginPath();
  for (var i = 0; i < innerWidth; i+= 10) {
    ctx.moveTo(i,0);
    ctx.lineTo(i,innerHeight);
    ctx.stroke();
  }
  for (var i = 0; i < innerHeight; i+= 10) {
    ctx.moveTo(0,i);
    ctx.lineTo(innerWidth, i);
    ctx.stroke();
  }
}

class Ship {
  constructor(name) {
    this.ship = name;
    this.x = 0;
    this.y = 0;
    this.direction = "03";
    this.hp = 100;
    this.shield = 100;
  }

  adv()
  {
    if (this.direction === "03")
      this.x = this.x + (move * 3);
    else if (this.direction === "06")
      this.y = this.y + (move * 3);
    else if (this.direction == "09")
      this.x = this.x - (move * 3);
    else if (this.direction == "12")
      this.y = this.y - (move * 3);
    // ctx.drawImage(this.ship, this.x, this.y);
  }

  turn(dir)
  {
    if (this.direction === "03")
    {
      if (dir === "left")
      {
        this.ship.src = "imgs/F5S1/12.png";
        this.direction = "12";
      }
      else if (dir === "right")
      {
        this.ship.src = "imgs/F5S1/06.png";
        this.direction = "06";
      }
    }
    else if (this.direction === "06")
    {
      if (dir === "left")
      {
        this.ship.src = "imgs/F5S1/03.png";
        this.direction = "03";
      }
      else if (dir === "right")
      {
        this.ship.src = "imgs/F5S1/09.png";
        this.direction = "09";
      }
    }
    else if (this.direction === "09")
    {
      if (dir === "left")
      {
        this.ship.src = "imgs/F5S1/06.png";
        this.direction = "06";
      }
      else if (dir === "right")
      {
        this.ship.src = "imgs/F5S1/12.png";
        this.direction = "12";
      }
    }
    else if (this.direction === "12")
    {
      if (dir === "left")
      {
        this.ship.src = "imgs/F5S1/09.png";
        this.direction = "09";
      }
      else if (dir === "right")
      {
        this.ship.src = "imgs/F5S1/03.png";
        this.direction = "03";
      }
    }
  }

  show(){
    ctx.drawImage(this.ship, this.x, this.y);
  }
}

ship1 = new Ship(ship_img);

function moveShip() {
  ship1.adv();
}

function turnShip(val) {
  ship1.turn(val);
}

function animate(){
  requestAnimationFrame(animate);
  ctx.clearRect(0, 0, 1200, 800);
  drawGrid();
  ship1.show();
  // ship.draw();
}
animate();
