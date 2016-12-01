
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		table{
			border-collapse: collapse;
		}
		tr td{
			border:1px solid navy;
			padding:5px ;
		}
	</style>
</head>
<body>
	<table>
		<?php 
	for ($i=1; $i<=10 ; $i++) { 
		echo "<tr>";
		for ($j=1; $j <=10; $j++) { 
			echo "<td>".$j."x".$i."=".$j*$i."</td>";
		}
		echo "</tr>";
	}
?>		
	</table>
</body>
</html>