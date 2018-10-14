function _(x){
  return (document.getElementById(x));
}

var canvas = _('myCanvas');
var ctx = canvas.getContext("2d");
var innerWidth = 1500;
var innerHeight = 1000;
var move = 10;

var ship_img = new Image();
var ship_img1 = new Image();
var ship_img2 = new Image();
var ship_img3 = new Image();
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
  constructor(name, x, y, ship) {
    this.ship = name;
    this.x = x;
    this.y = y;
    if (ship == 1)
    {
      this.direction = "03";
    }
    else if (ship == 2)
    {
      this.direction = "09";
    }
    this.hp = 100;
    this.shield = 100;
  }

  adv(dist)
  {
    if (this.hp > 0)
    {
      if (this.direction === "03")
        this.x = this.x + (move * dist);
      else if (this.direction === "06")
        this.y = this.y + (move * dist);
      else if (this.direction == "09")
        this.x = this.x - (move * dist);
      else if (this.direction == "12")
        this.y = this.y - (move * dist);
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
          this.ship.src = this.ship.src.replace("03", "11");
          this.direction = "11";
        }
        else if (dir === "right")
        {
          this.ship.src = this.ship.src.replace("03", "06");
          this.direction = "06";
        }
      }
      else if (this.direction === "06")
      {
        if (dir === "left")
        {
          this.ship.src = this.ship.src.replace("06", "03");
          this.direction = "03";
        }
        else if (dir === "right")
        {
          this.ship.src = this.ship.src.replace("06", "09");
          this.direction = "09";
        }
      }
      else if (this.direction === "09")
      {
        if (dir === "left")
        {
          this.ship.src = this.ship.src.replace("09", "06");
          this.direction = "06";
        }
        else if (dir === "right")
        {
          this.ship.src = this.ship.src.replace("09", "11");
          this.direction = "11";
        }
      }
      else if (this.direction === "11")
      {
        if (dir === "left")
        {
          this.ship.src = this.ship.src.replace("11", "09");
          this.direction = "09";
        }
        else if (dir === "right")
        {
          this.ship.src = this.ship.src.replace("11", "03");
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

ship1 = new Ship(ship_img, 0, 0, 1);
ship2 = new Ship(ship_img1, 0, 500, 1);
ship3 = new Ship(ship_img2, 1320, 0, 2);
ship4 = new Ship(ship_img3, 1230, 500, 2);

function moveShip() {
  ship1.adv();
}

function turnShip(val) {
  ship1.turn(val);
}

function makeAciotnsP1() {
  act = _('moveShip1');
  ship1.adv(act.value);
  act.value = 0;
  act = _('turnShip1');
  ship1.turn(act.value);
  act.value = 0;
  act = _('moveShip2');
  ship2.adv(act.value);
  act.value = 0;
  act = _('turnShip2');
  ship2.turn(act.value);
  act.value = 0;
}

function makeAciotnsP2() {
  act = _('moveShip3');
  ship3.adv(act.value);
  act.value = 0;
  act = _('turnShip3');
  ship3.turn(act.value);
  act.value = 0;
  act = _('moveShip4');
  ship4.adv(act.value);
  act.value = 0;
  act = _('turnShip4');
  ship4.turn(act.value);
  act.value = 0;
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
