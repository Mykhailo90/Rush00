<?php
  require_once 'admin_main.php';
?>
<?php

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
			$_POST['manufact'] && $_POST['price'] && $_POST['categorys'] && $_POST['img'] && isset($_SESSION['name']))
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
			INSERT INTO goods (`position`, `amount`, `monufact`, `price`, `img`)
			VALUES ('{$_POST['position']}', '{$_POST['amount']}', '{$_POST['manufact']}', {$_POST['price']}, '{$_POST['img']}')
			;";
			if (mysqli_query($conn, $insert)) {
				echo "Новый продукт успешно добавлен!<br>";
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
				// echo "New id_food and id_categ added successfully<br>";
				} else {
					echo "Error: " . $insert . "<br>" . mysqli_error($conn);
				}
			}
			mysqli_close($conn);
		}
		else {
			echo"<h1>Пожалуйста заполите все поля!</h1>";
		}
}

	if (check_exist_product())
		add_product();
	$options = make_options();
?>

<html>
	<head>
		<style media="screen">
    body{
      font-size: 18px;
    }
    .ffff{
      margin-top: 50px;
      margin-left: -50px;
    }
      tr{
        width: 100%;
      }
      b{
        width: 200px;
        height: 30px;
        font-size: 20px;
      }
      table{
        text-align: left;
        vertical-align: center;
        margin-top: 50px;
        margin-left: 150px;
      }
      .cat_tab{
        margin-top: -215px;
        margin-left: 850px;
      }
      select{
        height: 150px;
        font-size: 14px;
      }
      #q{
        width: 320px;
        height: 40px;
        background-color: lightblue;
        font-size: 24px;
      }
      .test{

      }
      .rel{
        min-width: 950px;
        max-width: 1150px;
        height: 100%;
        display: block;
        margin: auto;
      }
      .add_forma{
        margin-left: 40px;
      }
      #price{
        margin-left: 40px;
      }

		</style>
	</head>
  <div class="test">
  <div class="rel">
	<div class="add_forma">
		<form method="post" style="text-align: left;" action="add_product.php">
      <p>
        <b>Производитель:</b> <input type="text" name="manufact"/>
      </p>

			<p>
        <b>Позиция:</b>
        <input id="pos" type="text" name="position"/>
      </p>

				<p>
          <b>Объем:</b>
           <input type="text" name="amount"/>
        </p>

				<p>
          <b>Ценa:</b>
          <input id="price" type="text" name="price"/>
        </p>
        <p>
          <b>Адрес фото:</b>
          <input type="text" name="img"/>
        </p>
      <!-- </form> -->
		</div>

		<div class="cat_tab">
      <!-- <form class="" action="add_product.php" method="post"> -->


      <p>
      <b>Укажите необходимые категории:</b>
			<br>
			<select size="5" multiple name="categorys[]">
				 <option disabled>Возможно несколько</option>
				<?= $options ?>
			</select>
		</p>
      </div>
      <div class="ffff">
      		<input id="q" type="submit" name="submit" value="Добавить" />
      </div>
      </form>
      <?php
        include 'footer.php';
       ?>
</div>

</div>
