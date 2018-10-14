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
ship_img1 = new Image();
ship_img2 = new Image();
ship_img3 = new Image();
ship_img3.src = 'imgs/greenship1/09.png';
ship_img2.src = 'imgs/greenship4/09.png';
ship_img1.src = 'imgs/F5S4/03.png';
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
  constructor(name, x, y) {
    this.ship = name;
    this.x = x;
    this.y = y;
    this.direction = "03";
    this.hp = 100;
    this.shield = 100;
  }

  adv()
  {
    if (this.hp > 0)
    {
      if (this.direction === "03")
        this.x = this.x + (move * 3);
      else if (this.direction === "06")
        this.y = this.y + (move * 3);
      else if (this.direction == "09")
        this.x = this.x - (move * 3);
      else if (this.direction == "12")
        this.y = this.y - (move * 3);
    }
    if (this.x < 0 || this.x > innerWidth - 1)
    {
      this.hp = 0;
      this.shield = 0;
    }
    if (this.y < 0 || this.y > innerWidth - 1)
    {
      this.hp = 0;
      this.shield = 0;
    }
  }

  turn(dir)
  {
    if (this.hp > 0)
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
  }

  show(){
    if (this.hp > 0)
      ctx.drawImage(this.ship, this.x, this.y);
  }
}

ship1 = new Ship(ship_img, 0, 0);
ship2 = new Ship(ship_img1, 0, 500);
ship3 = new Ship(ship_img2, 1320, 0);
ship4 = new Ship(ship_img3, 1230, 500);

function moveShip() {
  ship1.adv();
}

function turnShip(val) {
  ship1.turn(val);
}

function animate(){
  requestAnimationFrame(animate);
  ctx.clearRect(0, 0, 1500, 1000);
  drawGrid();
  ship1.show();
  ship2.show();
  ship3.show();
  ship4.show();
  // ship.draw();
}
animate();
