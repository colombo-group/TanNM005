<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ve do thi</title>
	<style>
		.div{
			width: 400px;
			border:1px solid navy;
			height: 30px;
			text-align: center;
		}
		
	</style>
</head>
<body>
	<form action="bai002.php" method="post">
		<?php
			$arr = ['Châu Á','Châu Au','Châu Mỹ'];
			foreach ($arr as $key => $value) {
			 	echo "<label>".$value."</label><input type='number' name='".$key."' min='0' max='100' /><br/>";
			 } 
		 ?>
		<button type="submit">Vẽ</button>
	</form>
	<table>
		<?php
			if($_SERVER['REQUEST_METHOD']=='POST'){	
				for ($i=0; $i < count($arr); $i++) { 
					$percent = (int)$_POST[$i];
					$text = "<tr><td>";
					$text.= $arr[$i];
					$text .="</td>";
					$text .= "<td>";
					$text .="<div class='div'><div style='width:";
					$text .=$percent;
					$text .="%;height:100%;background:red'>".$percent."%</div></div></td></tr>";
					echo $text;
				}	
			} 
		?>
	</table>
</body>
</html>