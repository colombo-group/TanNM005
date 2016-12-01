<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method='POST'>
		<input type="num" min='0' required name='num'>
		<button type='submit'>Vẽ Tam Giác</button>
	</form>
	<div style='text-align: center'>
		<?php 
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$num = $_POST['num'];
			$text='';
			for($i =1;$i<=$num;$i++){
				 $half = $i/2;
				for( $j = $i;$j>$half;$j--){
					$text.=($j%10)." ";
				}
				if($i%2!=0){
					 $tmp = (int)($half)+2;
					while($tmp <= $i){
						$text.= ($tmp%10)." ";
						$tmp++;
					}
				}
				else{
					 $tmp = $half+1;
					while($tmp <= $i){
						$text.= ($tmp%10)." ";
						$tmp++;
					}
				}
				$text.="<br/>";
			}
			echo $text;
		}
		?>
	</div>
</body>
</html>