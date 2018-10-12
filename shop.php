<?php
include_once 'header.php';

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "zxcvb12345";
$dbNameShop = "shop";

$connS = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbNameShop);
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	
if (isset($_POST["add_to_cart"]) || $_GET['action'] == "delete")
{
	if ($_GET['action'] == "delete")
	{
		$count = 0;
		foreach($_SESSION["shopping_cart"] as $key => $item)
		{
			if ($key['item_id'][0] == $_GET['id']);
			{
				unset($_SESSION["shopping_cart"][$key]);
			}
		}
	}
	else if (isset($_SESSION["shopping_cart"][0]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if (!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array('item_id' => $_GET["id"], 'item_name' =>
			$_POST["hiden_name"], 'item_price' => $_POST["hiden_price"], 'item_quantity' => $_POST["quantity"]);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array('item_id' => $_GET["id"], 'item_name' => $_POST["hiden_name"], 'item_price' => $_POST["hiden_price"], 'item_quantity' => $_POST["quantity"]);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
	$num = 0;
	$_SESSION["total"] = $num;
	foreach($_SESSION["shopping_cart"] as $item)
	{	
		$total = $item['item_price'] * $item['item_quantity'];
		$_SESSION["total"] = $_SESSION["total"] + $total;
	}
	var_dump($_SESSION["total"]);
}
$sql = "SELECT * FROM items";
$result = mysqli_query($connS, $sql);
?>
<section class="main-container">
	<h2>Shop</h2>
	<div class="cat-wrapper">
		<h3>Category : </h3>
		<form action="shop.php" method="GET">
		<select class="cat-select" name="categories" size="2">
			<option value="monster">Monsters</option>
			<option value="trap">Traps</option>
		</select>
		<input class="cat_btn" type="submit" name="category" value="Filter" />
		</form>
	</div>
	<div class="shop-wrapper">
	<?php
	if (mysqli_num_rows($result) > 0 && $_GET['categories'] != NULL)
	{
		while ($row = mysqli_fetch_array($result))
		{
			if (strstr($row['sh_category'], $_GET['categories']))
			{
				$_SESSION['categories'] = $_GET['categories'];
	?>
		<div class="item-container">
			<form method="post" action="shop.php?action=add&id=<?php echo $row["sh_id"];?>&categories=<?php echo $_SESSION['categories'];?>">
				<img class="shop-item" src="<?php echo $row["sh_image"]; ?>" /><br/>
				<div>
					<h4><?php echo $row["sh_name"]; ?> </h4>
					<h4>R <?php echo $row["sh_price"]; ?> </h4>
					<input type="number" name="quantity" value="1" />
					<input type="hidden" name="hiden_name" value="<?php echo $row["sh_name"]; ?>" />
					<input type="hidden" name="hiden_price" value="<?php echo $row["sh_price"]; ?>" />
					<input class="addto" type="submit" name="add_to_cart" value="add_to_cart" />
				</div>
			</form>
		</div>
	<?php
			}
	}
}
?>
</div>
<br />
<div class="table-wrapper">
	<h3>Order Details</h3>
	<div>
		<table>
			<tr>
				<th width="40%">Item Name</th>
				<th width="40%">Quantity</th>
				<th width="40%">Price</th>
				<th width="40%">Total</th>
				<th width="40%">Action</th>
			</tr>
			<?php
			if (!empty($_SESSION["shopping_cart"]))
			{
				$total = 0;
				foreach ($_SESSION["shopping_cart"] as $k => $v)
				{
			?>
			<tr>
				<td><?php echo $v["item_name"]; ?></td>
				<td><?php echo $v["item_quantity"]; ?></td>
				<td><?php echo $v["item_price"]; ?></td>
				<td><?php echo number_format($v["item_quantity"] *  $v["item_price"], 2); ?></td>
				<td><a href="shop.php?action=delete&id=<?php echo $v['item_id']?>&categories=<?php echo $_SESSION['categories'];?>">Remove</a></td>
			</tr>
			<?php
				$total = $total + ($v["item_quantity"] * $v["item_price"]);
				}
			}
			?>
			<tr></tr>
		</table>
	</div>
</div>

</section>
<?php
include_once 'footer.php';
?>