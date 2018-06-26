<?php
  require_once 'admin_main.php';
?>

<?php
function find_categ($catalog_id, $categ){
	for ($i=0; $i < count($catalog_id); $i++) {
		if ($catalog_id[$i][1] == $categ)
			return ($catalog_id[$i][0]);
	}
	return (-1);
}

	$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}
	$select = "
	SELECT * FROM goods
	;";
	$query = mysqli_query($conn, $select);
	$goods = mysqli_fetch_all($query);

	$select = "
	SELECT * FROM foods_categ
	;";
	$query = mysqli_query($conn, $select);
	$foods_categ = mysqli_fetch_all($query);

	$select = "
	SELECT * FROM catalog_id
	;";
	$query = mysqli_query($conn, $select);
	$catalog_id = mysqli_fetch_all($query);
	$current_categ = find_categ($catalog_id, $_POST['categ']);
	if ($_POST && $_POST['Dellete'])
	{
		$dellete_from_goods = "
								DELETE FROM goods
								WHERE id = {$_POST['ID']}
								;";
		$query = mysqli_query($conn, $dellete_from_goods);
		$dellete_from_id_p_id_c = "
								DELETE FROM foods_categ
								WHERE id_food = {$_POST['ID']}
								;";
		$query = mysqli_query($conn, $dellete_from_id_p_id_c);
	}
?>

<html>
	<head>
		<title>Dellete goods</title>
	</head>
	<body>
		<form method="post">
			<?php
				$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				$select = "
				SELECT catalog_name FROM catalog_id
				;";
				$query = mysqli_query($conn, $select);
				$catalog_id = mysqli_fetch_all($query);
				for ($i=0; $i < count($catalog_id); $i++) {
					echo "<button type=\"submit\" name=\"categ\" value=\"{$catalog_id[$i][0]}\">{$catalog_id[$i][0]}</button>";
				}
			?>
		</form>
		<?php
			if ($_POST)
				for ($i=0; $i < count($goods); $i++) {
					for ($j=0; $j < count($foods_categ); $j++) {
						if ($current_categ == $foods_categ[$j][0] && $foods_categ[$j][1] == $goods[$i][0]){
							echo "<div>
							<p>Позиция : {$goods[$i][1]}</p>
							<p>Объем: {$goods[$i][2]}</p>
							<p>Производитель: {$goods[$i][3]}</p>
							<p>Цена = {$goods[$i][4]}$</p>
							<img src={$goods[$i][5]} height:\"1px\">
							<form action=\"dell_product.php\" method=\"post\">
								<input type=\"hidden\" name=\"ID\" value=\"{$goods[$i][0]}\">
								<input type=\"submit\" name=\"Dellete\" value=\"Dellete\">
							</form>
							<p>___________________________________________________</p>
						</div>";
						}
					}
				}
		?>
	</body>
</html>
