<?php
include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Game2</h2>
	</div>
	<img src="imgs/F5S1/03.png" class="hidden" alt="F5S1" id="f5s1"/>
	<div class="gameScreen">
	  <canvas id="myCanvas" width="1200" height="800" style="border:1px solid #000000;">
	  </canvas>
	</div>
	<button onclick="moveShip()">go</button>
	<button onclick="turnShip('left')">left</button>
	<button onclick="turnShip('right')">right</button>


  <script>
	var canvas = _('myCanvas');
	var ctx = canvas.getContext("2d");


  function _(x){
    return (document.getElementById(x));
  }

	class Ship {
		constructor(ship) {
			this.ship = document.getElementById(ship);
			this.x = 0;
			this.y = 0;
			this.direction = "03";
		}

		// update()
		// {
		// 	this.x = 400;
		// 	this.y = 400;
		// }

		adv()
		{
			if (this.direction === "03")
				this.x = this.x + (8 * 10);
			else if (this.direction === "06")
				this.y = this.y + (8 * 10);
			else if (this.direction == "09")
				this.x = this.x - (8 * 10);
			else if (this.direction == "12")
				this.y = this.y - (8 * 10);
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
		show()
		{
			ctx.drawImage(this.ship, this.x, this.y);
		}
	}

	function drawGrid(){
		ctx.lineWidth = 0.5;
		ctx.strokeStyle = 'gray';
		ctx.beginPath();
	  for (var i = 0; i < 1500; i+= 8) {
	    ctx.moveTo(i,0);
	    ctx.lineTo(i,1000);
	    ctx.stroke();
	  }
	  for (var i = 0; i < 1200; i+= 8) {
	    ctx.moveTo(0,i);
	    ctx.lineTo(1500, i);
	    ctx.stroke();
	  }
	}

	var ship1;

	window.onload = function()
	{
		drawGrid();
		ship1 = new Ship('f5s1');
		ship1.show();
	}

	function moveShip() {

		drawGrid();
		ship1.adv();
		ship1.show();
	}

	function turnShip(val) {
		ctx.save();
		ctx.clearRect(0, 0, 1200, 800);
		drawGrid();
		ship1.turn(val);
		ship1.show();
		ctx.restore();
	}
  </script>
</section>
<?php
include_once 'footer.php';
?>
