<?php
include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<?php
		if (isset($_SESSION['user_name']))
			echo 'Welcom '.$_SESSION['user_name'];
		?>
	</div>
</section>
<?php
include_once 'footer.php';
?>