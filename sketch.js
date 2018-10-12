function setup() {
 // put setup code here
 createCanvas(600, 600);
 s = new Ship();
}

function draw() {
 // put drawing code here
 background(0);
 // stroke(255);
 // strokeWeight(0.1);  x = 0;
 // y = 0;
 // while (x < width)
 // {
 //   line(x, 0, x, height);
 //   line(0, y, width, y);
 //   x += 10;
 //   y += 10;
 // }
 s.update();
 s.show();
}

function Ship() {
 this.x = 300;
 this.y = 300;
 this.xspeed = 1;
 this.yspeed = 0;

 this.update = function() {
   this.x = this.x + this.xspeed;
   this.y = this.y + this.yspeed;
 }
 this.show = function () {
   fill(255);
   rect(this.x, this.y, 10, 10);
 }
}
