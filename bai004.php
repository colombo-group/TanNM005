<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>bai--4</title>
</head>
<body>
	<form action="" method='get'>
		<input type="number" min='0' required name='num'>
		<button type='submit'>Vẽ Tam Giác</button>
	</form>
	<div>
		<?php 

			if($_SERVER['REQUEST_METHOD']=='GET'){
				$num = $_GET['num'];
				for ($i=1; $i <=$num ; $i++) { 
					for ($j=$i; $j >=1 ; $j--) { 
						echo ($j%10) ." ";
					}
					echo "<br/>";
				}
			}

		?>
	</div>
</body>
</html>
