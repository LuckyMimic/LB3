<!DOCTYPE html>
<html>
<head>
	<title>My Store</title>
</head>
<body>
	<!-- Форма для запроса товаров выбранного производителя -->
	<form action="get1.php" method="get">
		<label for="vendor">Выберите производителя:</label>
		<select name="vendor" id="vendor">
			<?php
				include('connect.php');
				try {
					$stmt = $dbh->query("SELECT ID_Vendors, v_name FROM vendors");
					$res = $stmt->fetchAll();

					foreach($res as $row)
					{
						echo "<option value='$row[0]'>$row[1]</option>";
					}
				}
				catch(PDOException $ex) {
					echo $ex->GetMessage();
				}

				$dbh = null;
			?>
		</select>
		<input type="submit" value="Найти товары">
	</form>
	<!-- Форма для запроса товаров выбранной категории -->
	<form action="get2.php" method="get">
		<label for="category">Выберите категорию:</label>
		<select name="category" id="category">
			<?php
				include('connect.php');
				try {
					$stmt = $dbh->query("SELECT ID_Category, c_name FROM category");
					$res = $stmt->fetchAll();

					foreach($res as $row)
					{
						echo "<option value='$row[0]'>$row[1]</option>";
					}
				}
				catch(PDOException $ex) {
					echo $ex->GetMessage();
				}

				$dbh = null;
			?>
		</select>
		<input type="submit" value="Найти товары">
	</form>
	<!-- Форма для запроса товаров в указанном ценовом диапазоне -->
	<form action="get3.php" method="get">
		<label for="min_price">Минимальная цена:</label>
		<input type="text" name="min_price" id="min_price">
		<label for="max_price">Максимальная цена:</label>
		<input type="text" name="max_price" id="max_price">
		<input type="submit" value="Найти товары">
	</form>
</body>
</html>
