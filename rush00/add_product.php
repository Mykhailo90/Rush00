<?php

function create_table_goods()
{
	$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error()) . "<br>";
	}
	$sql = "CREATE TABLE IF NOT EXISTS goods (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	position VARCHAR(30),
	amount VARCHAR(30),
	manufact VARCHAR(30),
	price INT,
	img VARCHAR(255)
	);";
	if (mysqli_query($conn, $sql)) {
	    echo "Table Items created successfully" . "<br>";
	} else {
	    echo "Error creating table: " . mysqli_error($conn) . "<br>";
	}
	mysqli_close($conn);
}

function create_table_foods_categ()
{
	$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error()) . "<br>";
	}
	$sql = "CREATE TABLE IF NOT EXISTS foods_categ (
	id_food INT,
	id_categ INT
	);";
	if (mysqli_query($conn, $sql)) {
	    echo "Table foods_categ created successfully" . "<br>";
	} else {
	    echo "Error creating table: " . mysqli_error($conn) . "<br>";
	}
	mysqli_close($conn);
}

function make_options()
{
	$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "
	SELECT catalog_name FROM catalog_id
	;";
	$query = mysqli_query($conn, $sql);
	$var = mysqli_fetch_all($query);
	$list = "";
	for ($i=0; $i < count($var); $i++) {
		$list .= "<option value=\"{$var[$i][0]}\">{$var[$i][0]}</option>\n";
	}
	return ($list);
}

function check_exist_product()
{
	if ($_POST && $_POST['submit'] && $_POST['position'] && $_POST['amount'] &&
		$_POST['manufact'] && $_POST['price'] && $_POST['categorys'] && $_POST['img'])
	{
		$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
		if (!$conn) {
	    	die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "
		SELECT * FROM goods
		WHERE position LIKE '%{$_POST['position']}%' AND amount LIKE '%{$_POST['amount']}%' AND manufact LIKE '%{$_POST['manufact']}%'
		;";
		$query = mysqli_query($conn, $sql);
		$var = mysqli_fetch_all($query);

		if ($var)
		{
			echo "Error product Allready exist u can add this product to another category if u want";
			return (0);
		}
	}
	return (1);
}

function add_product()
{
		if ($_POST && $_POST['submit'] && $_POST['position'] && $_POST['amount'] &&
			$_POST['manufact'] && $_POST['price'] && $_POST['categorys'] && $_POST['img'])
		{
			$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$select = "
			SELECT * FROM catalog_id
			;";
			$query = mysqli_query($conn, $select);
			$var = mysqli_fetch_all($query);
			$insert = "
			INSERT INTO goods (`position`, `amount`, `manufact`, `price`, `img`)
			VALUES ('{$_POST['position']}', '{$_POST['amount']}', '{$_POST['manufact']}', {$_POST['price']}, '{$_POST['img']}')
			;";
			if (mysqli_query($conn, $insert)) {
				echo "New product added successfully<br>";
			} else {
				echo "Error: " . $insert . "<br>" . mysqli_error($conn);
			}
			$q_id = mysqli_insert_id($conn);
			for ($i=0; $i < count($_POST['categorys']); $i++) {
				$category_id;
				for ($j=0; $j < count($var); $j++) {
					if ($var[$j][1] === $_POST['categorys'][$i]){
						$category_id = $var[$j][0];
					}
				}
				$insert = "
				INSERT INTO foods_categ (`id_food`, `id_categ`)
				VALUES ($q_id, $category_id)
				;";
				if (mysqli_query($conn, $insert)) {
				echo "New id_food and id_categ added successfully<br>";
				} else {
					echo "Error: " . $insert . "<br>" . mysqli_error($conn);
				}
			}
			mysqli_close($conn);
		}
		else {
			echo"U didnt insert all values!";
		}
}
	create_table_goods();
	create_table_foods_categ();
	if (check_exist_product())
		add_product();
	$options = make_options();
?>

<html>
	<head>
		<title>Add items</title>
	</head>
	<body>
		<form method="post" style="text-align: center;"> Add Items
			<br>
			<b>Производитель:</b> <input type="text" name="manufact"/>
			<br>
			<b>Позиция:</b> <input type="text" name="position"/>
			<br>
			<b>Объем:</b> <input type="text" name="amount"/>
			<br>
			<b>Ценa:</b> <input type="text" name="price"/>
			<br>
			<p>
				<b>Категории:</b>
				<br>
				<select size="5" multiple name="categorys[]">
				   <option disabled>Выберите категорию</option>
					<?= $options ?>
				</select>
			</p>
			<br>
			<b>Адрес фото:</b> <input type="text" name="img"/>
			<br>
			<input type="submit" name="submit" value="ADD" />
		</form>
	</body>
</html>
