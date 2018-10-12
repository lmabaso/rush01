<?php
include_once 'header.php';

/**
 *
 */
class Board
{
	public $play_board;

	public function __construct()
	{
		for ($i=0; $i <100 ; $i++) {
			for ($j=0; $j < 150; $j++) {
				$this->play_board[$i][$j] = ".";
			}
		}
	}

	public function getMap(){
		return $this->play_board;
	}
}


?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Game</h2>
	</div>
	<div class="gameSreen">
		<?php
		$game = new Board();
		?>

	</div>
</section>
<?php
include_once 'footer.php';
?>
