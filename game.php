<?php
include_once 'header.php';

class Board
{
	public $play_board;

	public function __construct(){
		for ($i=0; $i <100 ; $i++) {
			for ($j=0; $j < 150; $j++) {
				$this->play_board[$i][$j] = ".";
			}
		}
	}

	public function getMap(){
		return $this->play_board;
	}

	public function drawMap(){
		for ($i=0; $i < 100 ; $i++) {
			echo "<div class='gridrow'>";
			for ($j=0; $j < 150; $j++) {
				echo "<div class='gridcol' id=_".$i."_".$j."></div>";
			}
			echo "</div>";
		}
	}
}


?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Game</h2>
	</div>
	<div class="gameScreen">
		<canvas id="myCanvas" width="1500" height="1000" style="border:1px solid #000000;">
	  </canvas>
	</div>
	<div style="display: flex">
	<div>
		<P>Player 1</p><br/>
			move small ship:
			<select id = "moveShip1">
				<option value="0">0</option>
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			</select>
			<br/>
			move small ship:
			<select id = "turnShip1">
				<option value="no">no turn</option>
				<option value="left">left</option>
			  <option value="right">right</option>
			</select>
			<br/>
			move big ship:
			<select id = "moveShip2">
				<option selected value="0">0</option>
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			</select>
			<br/>
			move big ship:
			<select id = "turnShip2">
				<option value="no">no turn</option>
				<option value="left">left</option>
			  <option value="right">right</option>
			</select>
			<br/>
			<button onclick="makeAciotnsP1()">play</button>
	</div>

	<div>
		<P>Player 2</p><br/>
			move small ship:
			<select id = "moveShip3">
				<option value="0">0</option>
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			</select>
			<br/>
			move small ship:
			<select id = "turnShip3">
				<option value="no">no turn</option>
				<option value="left">left</option>
			  <option value="right">right</option>
			</select>
			<br/>
			move big ship:
			<select id = "moveShip4">
				<option selected value="0">0</option>
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			</select>
			<br/>
			move big ship:
			<select id = "turnShip4">
				<option value="no">no turn</option>
				<option value="left">left</option>
			  <option value="right">right</option>
			</select>
			<br/>
			<button onclick="makeAciotnsP2()">play</button>
	</div>
</div>
	<script src="sketch.js" ></script>
</section>
<?php
include_once 'footer.php';
?>
