<?php
$a = "";
$b = "";
$c = "";
if(isset($_GET['a'],$_GET['b'],$_GET['c'])){
	$a = $_GET['a'];
	$b = $_GET['b'];
	$c = $_GET['c'];
	$patern = '/[^0-9]/';
	if(preg_match($patern,$a ) || preg_match($patern,$b ) || preg_match($patern,$c )){
		echo "ban phai nhap so";
	}
	else{
		$arr = [];
		if($b>$a){
			echo " khong tim duoc ket qua";
		}
		else{
			for ($i=$b+1; $i < $a; $i++) { 
				if($i%$b==0 && $i>0){
					array_push($arr, $i);
				}
			}
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bonus 001</title>
	<style>
		#link{
			margin-top: 20px;
		}
		a{
			color:black;
			padding: 5px;
		}
		#active{
			font-weight: bold;
		}
	</style>
</head>
<body>
	<form action="" method='get'>
		<input type="text" placeholder="So a" name='a' value="<?=$a ?>" required><br/>
		<input type="text" placeholder="So b" name='b' value="<?=$b ?>" required><br/>
		<input type="text" placeholder="So c" name='c' value="<?=$c ?>" required><br/>
		<button type='submit'>Hiển thị</button>
	</form>
	<?php 
	if(isset($arr)){
		$leng = count($arr);
		if($leng>0){
			$page= 1;
			if($leng % $c!= 0 ){
				$pageLimit = (int)($leng / $c)+1;
			}
			else{
				$pageLimit = (int)($leng / $c);
			}
			if(isset($_GET['page'])){
				$page = $_GET['page'];
			}

			$start = ($page*$c)-$c;
			if($page == $pageLimit){
				$end = $leng;
			}
			else{
				$end = $page*$c;
			}
			for($i = $start ; $i < $end; $i++){
				echo $arr[$i]." ";
			}


				?>
		<div id="link">
				<?php
			if($page>1){
				echo "<a href='?a=".$a."&b=".$b."&c=".$c."&page=".($page-1)."'>Prev</a>";
			}
			if($page==1){
				echo "<a href='?a=".$a."&b=".$b."&c=".$c."&page='1' id='active'>1</a>";

			}
			else{
				echo "<a href='?a=".$a."&b=".$b."&c=".$c."&page='1'>1</a>";

			}


			if($pageLimit >7){
				if($page-3>1){
					$startLink = $page-2;
					$ectBefore = "<span>...</span>";
				}else{
					$startLink = 2;
				}

				if($page+3<$pageLimit){
					$endLink = $page+2;
					$ectEnd = "<span>...</span>";
				}
				else{
					$endLink = $pageLimit-1;
				}

				if(isset($ectBefore)){
					echo $ectBefore;
				}
				for ($i=$startLink; $i <=$endLink ; $i++) { 
					if($page==$i){
						echo "<a href='?a=".$a."&b=".$b."&c=".$c."&page=".$i."' id='active'>".$i."</a>";

					}
					else{
					echo "<a href='?a=".$a."&b=".$b."&c=".$c."&page=".$i."'>".$i."</a>";

					}

				}

				if(isset($ectEnd)){
					echo $ectEnd;
				}
			}

			else{
				for ($i=2; $i <=$pageLimit-1 ; $i++) { 
					if($page==$i){
						echo "<a href='?a=".$a."&b=".$b."&c=".$c."&page=".$i."' id='active'>".$i."</a>";

					}
					else{
					echo "<a href='?a=".$a."&b=".$b."&c=".$c."&page=".$i."'>".$i."</a>";

					}
				}
			}
			if($page==$pageLimit){
			echo "<a href='?a=".$a."&b=".$b."&c=".$c."&page=".($page-1)."' id='active'>".$pageLimit."</a>";

			}
			else{
			echo "<a href='?a=".$a."&b=".$b."&c=".$c."&page=".($page-1)."'>".$pageLimit."</a>";

			}

			if($page<=$pageLimit -1){
				echo "<a href='?a=".$a."&b=".$b."&c=".$c."&page=".($page+1)."'>Next</a>";
			}
		}
	}
	?>
	</div>
</body>
</html>