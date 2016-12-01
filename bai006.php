	<?php 
	$x1= "";
	$x2 = "";
	$rs ="";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['phepTinh'])&&isset($_POST['x1'])&&isset($_POST['x2'])){
			$phepTinh = $_POST['phepTinh'];
			$x1 = $_POST['x1'];
			$x2 = $_POST['x2'];
			$patern = '/[^0-9]/';
			if(preg_match($patern, $x1)||preg_match($patern, $x1)){
				echo 'x1 x2 phai la so';
			}
			else{
			$rs = Tinh($phepTinh,$x1,$x2);

			}
		}
		else{
			echo 'ban phai nhap du du lieu';
		}
}
	function Tinh($phepTinh , $x1 , $x2){
		switch ($phepTinh) {
			case 'cong':
				return $x1 + $x2;
				break;
			case 'tru':
				return $x1 - $x2;
				break;
			case 'nhan':
				return $x1 * $x2;
				break;
			case 'chia':
				return $x1/$x2;
				break;
			
			default:
				return pow($x1, $x2);
				break;
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sndklls</title>
</head>
<body>
	<form action="" method='POST'>
		<input type="text" name='x1' value='<?php echo $x1; ?>' />
		<input type="radio" name='phepTinh' value='cong'>&#43
		<input type="radio" name='phepTinh' value='tru'>&#45
		<input type="radio" name='phepTinh' value='nhan'>x
		<input type="radio" name='phepTinh' value='chia'>/
		<input type="radio" name='phepTinh' value='mu'>&#94
		<input type="text" name='x2' value='<?php echo $x2; ?>' />
		<button type='submit'>=</button>
		<input type="text" name='rs' value='<?=$rs ?>'>
	</form>
