<?php
  require_once 'admin_main.php';
?>
<?php
	if ($_POST && $_POST['submit'] == "ADD" && $_POST['category'])
	{
		$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
		$select = "
		SELECT * FROM catalog_id
		;";
		$query = mysqli_query($conn, $select);
		$var = mysqli_fetch_all($query);
		$flag = 0;
		for ($i=0; $i < count($var); $i++) {
			if ($var[$i][1] == $_POST['category']){
				$flag = 1;
			}
		}
		$_POST['category'] = trim($_POST['category']);
		if ($flag == 0 && $_POST['category'] != ""){
			$insert =   "
						INSERT INTO catalog_id (catalog_name)
						VALUES ('{$_POST['category']}')
						;";
			mysqli_query($conn, $insert);
			echo "Категория успешно добавлена";
		}
		else
		{
			echo "Эта категория уже присутвствует или вы ввели не валидные данные";
		}
	}
?>

<html>
	<head>
		<title>Add Category</title>
		<style media="screen">
		body{
			font-size: 18px;
		}
		p{
			font-size: 24px;

			width: 100%;
		}
		input{
			width: 300px;
			height: 40px;
		}
		.as{
			display: block;
		}
		#sub{
			width: 500px;
			height: 50px;
			font-size: 120%;
			background-color: lightblue;
		}
		</style>
	</head>

	<div class="add_cat">
		<h1>Добавить категорию:</h1>
	</div>

		<form method="post" style="text-align: center;">
			<div class="as">
				<p>Имя категории:
 			 	<input type="text" name="category"/> </p>
			 	<input id="sub" type="submit" name="submit" value="ADD" />
				</div>
			 </form>



	</body>
</html>
<?php
	include 'footer.php';
 ?>
