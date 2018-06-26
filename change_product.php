<?php
  require_once 'admin_main.php';
?>


<?php

function count_categs_of_product($id)
{

    $conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
    $sql = "SELECT * FROM foods_categ;";
    $query = mysqli_query($conn, $sql);
    $var = mysqli_fetch_all($query);
    $caunt_categs = 0;
    for ($i=0; $i < count($var); $i++) {
        if ($var[$i][1] == $id)
            $caunt_categs++;
    }
    if ($caunt_categs <= 1)
    {
        return (0);
    }
    else {
        return (1);
    }
}

function find_categ($catalog_id, $categ){
	for ($i=0; $i < count($catalog_id); $i++) {
		if ($catalog_id[$i][1] == $categ)
			return ($catalog_id[$i][0]);
	}
	return (-1);
}

function make_dell_options($goods, $foods_categ)
{
	$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "
	SELECT * FROM catalog_id
	;";
	$query = mysqli_query($conn, $sql);
	$var = mysqli_fetch_all($query);
	$list = "";
	for ($i=0; $i < count($var); $i++) {
		for ($j=0; $j < count($foods_categ); $j++) {
			if ($foods_categ[$j][0] == $var[$i][0]  && $goods == $foods_categ[$j][1]){
				$list .= "<option value=\"{$var[$i][1]}\">{$var[$i][1]}</option>\n";
			}
		}

	}
	return ($list);
}

function make_add_options($goods, $foods_categ)
{
	$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "
	SELECT * FROM catalog_id
	;";
	$query = mysqli_query($conn, $sql);
	$var = mysqli_fetch_all($query);
	$list = array();
	for ($i=0; $i < count($var); $i++) {
		for ($j=0; $j < count($foods_categ); $j++) {
			if ($foods_categ[$j][0] == $var[$i][0]  && $goods == $foods_categ[$j][1]){
				$list[] = $var[$i][0];
			}
		}
	}
	$j = 0;
	for ($i=0; $i < count($var); $i++) {
		if ($var[$i][0] == $list[$j]){
			$var[$i][1] = "";
			$j++;
		}
	}
	for ($i=0; $i < count($var); $i++) {
		if ($var[$i][1] != ""){
			$list .= "<option value=\"{$var[$i][1]}\">{$var[$i][1]}</option>\n";
		}
	}
	return ($list);
}

function add_categ($id_fooduct, $names_categ)
{
		$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
		$select = "
		SELECT * FROM catalog_id
		;";
		$query = mysqli_query($conn, $select);
		$catalog_id = mysqli_fetch_all($query);
		$j = 0;
		for ($i=0; $i < count($catalog_id); $i++) {
			if ($catalog_id[$i][1] == $names_categ[$j])
			{
				$insert = "
							INSERT INTO foods_categ (`id_food`, `id_categ`)
							VALUES
							({$id_fooduct}, {$catalog_id[$i][0]})
							;";
				mysqli_query($conn, $insert);
				$j++;
				$i = 0;
			}
		}
}

function remove_categ($id_fooduct, $names_categ)
{
    if(count_categs_of_product($id_fooduct)){
  		$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
  		$select = "
  		SELECT * FROM catalog_id
  		;";
  		$query = mysqli_query($conn, $select);
  		$catalog_id = mysqli_fetch_all($query);
  		$j = 0;
  		for ($i=0; $i < count($catalog_id); $i++) {
  			if ($catalog_id[$i][1] == $names_categ[$j])
  			{
  				$insert = "
  							DELETE FROM foods_categ
  							WHERE id_food = {$id_fooduct} AND id_categ = {$catalog_id[$i][0]}
  							;";
  				mysqli_query($conn, $insert);
  				$j++;
  				$i = 0;
  			}
  		}
    }
}

function change_product($rows)
{
	$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
	$sql = "UPDATE goods SET ";
	$coma = 0;
	if ($rows['manufact'])
	{
		$sql .= "manufact = {$rows['manufact']}";
		$coma = 1;
	}
	if ($rows['position'])
	{
		if ($coma == 1)
			$sql .= ", ";
		$sql .= "position = '{$rows['position']}'";
		$coma = 1;
	}
	if ($rows['amount'])
	{
		if ($coma == 1)
			$sql .= ", ";
		$sql .= "amount = '{$rows['amount']}'";
		$coma = 1;
	}
	if ($rows['price'])
	{
		if ($coma == 1)
			$sql .= ", ";
		$sql .= "price = {$rows['price']}";
		$coma = 1;
	}
	if ($rows['img'])
	{
		if ($coma == 1)
			$sql .= ", ";
		$sql .= "img = '{$rows['img']}'";
		$coma = 1;
	}
	$sql .= " WHERE id = {$rows['ID']}";
	$sql .= ";";
	if ($coma != 0)
		mysqli_query($conn, $sql);
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

		if ($_POST && $_POST['categorys'] && $_POST['add_categ'])
			add_categ($_POST['ID'], $_POST['categorys']);
		if ($_POST && $_POST['categorys'] && $_POST['dell_categ'])
			remove_categ($_POST['ID'], $_POST['categorys']);
		if ($_POST && $_POST['change'])
			change_product($_POST);
?>

<html>
	<head>
		<title>Change goods</title>
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
							$dell_options = make_dell_options($goods[$i][0], $foods_categ);
							$add_options = make_add_options($goods[$i][0], $foods_categ);
							echo "<div>
							<form action=\"change_product.php\" method=\"post\">
							<p>Производитель : <input type=\"text\"  name=\"manufact\" placeholder=\"{$goods[$i][3]}\"></p>
							<p>Позиция : <input type=\"text\"  name=\"position\" placeholder=\"{$goods[$i][1]}\"></p>
							<p>Объем : <input type=\"text\"  name=\"amount\" placeholder=\"{$goods[$i][2]}\"></p>
							<p>Цена : <input type=\"text\"  name=\"price\" placeholder=\"{$goods[$i][4]}\"></p>
							<p>Адрес фото : <input type=\"text\"  name=\"img\" placeholder=\"{$goods[$i][5]}\"></p>
							<input type=\"hidden\" name=\"ID\" value=\"{$goods[$i][0]}\">
							<input type=\"submit\" name=\"change\" value=\"Submit changes\" >
							</form>

							<form action=\"change_product.php\" method=\"post\">
							<p>Добавить в Категорию <br>
								<select size=\"5\" multiple name=\"categorys[]\">
								   <option disabled>Выберите категорию</option>
									{$add_options}
								</select>
							<br>
							<input type=\"submit\" name=\"add_categ\" value=\"Add to category\" >
							<input type=\"hidden\" name=\"ID\" value=\"{$goods[$i][0]}\">
							</p>
							</form>

							<form action=\"change_product.php\" method=\"post\">
							<p>Удалить из Категории <br>
								<select size=\"5\" multiple name=\"categorys[]\">
								   <option disabled>Выберите категорию</option>
								   {$dell_options}
								</select>
							<br>
							<input type=\"submit\" name=\"dell_categ\" value=\"Remove from category\" >
							<input type=\"hidden\" name=\"ID\" value=\"{$goods[$i][0]}\">
							</p>
							<img src={$goods[$i][5]} height:\"1px\">
							</form>
							<p>___________________________________________________</p>
						</div>";
						}
					}
				}
		?>
	</body>
</html>
