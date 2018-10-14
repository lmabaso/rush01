<?php
include_once 'header.php';

if ($_POST['submit'] == "ok")
{
	$val = explode('_', $_POST['ship']);
	var_dump($val);
	$y = intval($val[1]);
	$x = intval($val[2]);
	$x++;
	echo '_'.$y.'_'.$x;
	//$v = _$y._$x;
	//echo $v;
	echo '<body onload="myFunction()"> </body>';
}
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
	<button onclick="moveShip()">go</button>
	<button onclick="turnShip('left')">left</button>
	<button onclick="turnShip('right')">right</button>
	<script src="sketch.js" ></script>
</section>
<?php
include_once 'footer.php';
?>
