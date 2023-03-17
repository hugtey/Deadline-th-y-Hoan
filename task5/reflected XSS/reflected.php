
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reflected XSS Lab</title>
</head>
<body>
	<h1>Tìm kiếm</h1>
	<form method="get">
		<label>Tìm kiếm:</label>
		<input type="text" name="search">
		<input type="submit" value="Tìm kiếm">
	</form>
	<hr>
	<?php
		// Lấy giá trị từ khóa tìm kiếm
		$search_query = $_GET['search'];

		// Hiển thị kết quả tìm kiếm
		if (!empty($search_query)) {
			echo "Kết quả tìm kiếm cho từ khóa <b>".$search_query."</b>";
		}
	?>
</body>
</html>
