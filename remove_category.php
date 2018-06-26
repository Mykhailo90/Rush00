<?php
  require_once 'admin_main.php';
?>
<?php
	if ($_POST && $_POST['submit'] == "del" && $_POST['category'])
	{
		$conn = mysqli_connect("localhost", "msarapii", "Inn3315400371", "rush00");
		$select = "
		SELECT * FROM catalog_id
		WHERE catalog_name LIKE '%{$_POST['category']}%'
		;";



		$query = mysqli_query($conn, $select);
		$var = mysqli_fetch_all($query);

		$_POST['category'] = trim($_POST['category']);
		if ($_POST['category'] != "" && $var){
			$insert =   "
						DELETE FROM catalog_id
						WHERE catalog_name LIKE '%{$_POST['category']}%'
						;";
			mysqli_query($conn, $insert);
			echo "Категория успешно удалена";
		}
		else{
			echo "Такой категории не существует или введённые даные не валидны";
		}
	}
?>

<html>
	<head>
		<title>Delete Category</title>
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
		<h1>Удаление Категории: </h1>
	</div>

		<form method="post" style="text-align: center;">
			<div class="as">
				<p>Имя категории : <input type="text" name="category"/> </p>

				<input id="sub" type="submit" name="submit" value="del" />
			</div>

		</form>

<?php
	include 'footer.php';
 ?>
