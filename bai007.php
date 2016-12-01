<?php 
date_default_timezone_set("Asia/Ho_Chi_Minh");

$today = date('d');
$thisMonth = date('m');

$thisYear = date('Y');
$date = mktime(0,0,0,$thisMonth,01,$thisYear);

$firstDay =  date('w',$date);
$month= ['Jan','Feb','Mar','Apr$il','may','jun','jul','aug','set','oct','nov','dec'];
$arr  =[];
if(namNhuan($thisYear)){
	switch ($thisMonth) {
		case '1':
		$i=1;

		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '2':
		$i=1;

		while ( $i<= 29) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '3':
		$i=1;

		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '4':
		$i=1;

		while ( $i<= 30) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '5':
		$i=1;

		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '6':
		$i=1;

		while ( $i<= 30) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '7':
		$i=1;

		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '8':
		$i=1;

		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '9':
		$i=1;

		while ( $i<= 30) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '10':
		$i=1;

		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '11':
		$i=1;

		while ( $i<= 30) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '12':
		$i=1;
		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
	}
}
else{
	switch ($thisMonth) {
		case '1':
		$i=1;

		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '2':
		$i=1;

		while ( $i<= 28) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '3':
		$i=1;
		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '4':
		$i=1;

		while ( $i<= 30) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '5':
		$i=1;

		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '6':
		$i=1;

		while ( $i<= 30) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '7':
		$i=1;

		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '8':
		$i=1;

		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '9':
		$i=1;

		while ( $i<= 30) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '10':
		$i=1;

		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '11':
		$i=1;

		while ( $i<= 30) {
			array_push($arr,$i);
			$i++;
		}	
		break;
		case '12':
		$i=1;
		while ( $i<= 31) {
			array_push($arr,$i);
			$i++;
		}	
		break;
	}
}

$tmpArr = [];
$j=0;
while($j<$firstDay){
	array_push($tmpArr, "");
	$j++;
}

$j=0;
while($j<count($arr)){
	array_push($tmpArr, $arr[$j]);
	$j++;
}

function namNhuan($year){
	if($year%400==0 || ($year%4==0&&$year%100!=0)){
		return true;
	}
	else{
		return false;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		table {
			width: 100%;
			max-width: 600px;
			height: 320px;
			border-collapse: collapse;
			border: 1px solid #38678f;
			margin: 50px auto;
			background: white;
		}
		th {
			background: steelblue;
			height: 54px;
			font-weight: lighter;
			text-shadow: 0 1px 0 #38678f;
			color: white;
			border: 1px solid #38678f;
			box-shadow: inset 0px 1px 2px #568ebd;
			transition: all 0.2s;
		}
		tr {
			border-bottom: 1px solid #cccccc;
		}
		tr:last-child {
			border-bottom: 0px;
		}
		td {
			border-right: 1px solid #cccccc;
			padding: 10px;
			transition: all 0.2s;
		}
		#today{
			background: grey;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th colspan="7" d='info'><?php echo $month[$thisMonth-1]." ".$thisYear; ?></th>
			</tr>
			<tr>
				<th>Su</th>
				<th>Mo</th>
				<th>Tu</th>
				<th>We</th>
				<th>Th</th>
				<th>Fr</th>
				<th>Sa</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$tmp =0;
			$text ="";
			$leng = count($tmpArr);
			for($i=0;$i<count($tmpArr);$i++) {
				if($tmp == 0 ){
					if($tmpArr[$i] == $today){
						$text.="<tr><td id='today'>";
						$text.= $tmpArr[$i]."</td>";
					}
					else{
						$text.="<tr><td>";
						$text.= $tmpArr[$i]."</td>"; 
					}

					$tmp++;
				}
				else if($tmp == $leng-1 || $tmp==6){
					if($tmpArr[$i]==$today){
						$text.="<td id='today'>";
					}
					else{
						$text.="<td>";
					}
					$text.= $tmpArr[$i]; 
					$text .="</td></tr>";
					$tmp =0;
				}
				else {
					if($tmpArr[$i]==$today){
						$text.="<td id='today'>";

					}
					else{
						$text.="<td>";

					}
					$text.=$tmpArr[$i];
					$text.="</td>";
					$tmp++;

				}
			}
			echo $text;
			?>
		</tbody>
	</table>
</body>
</html>