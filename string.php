<?php 

$text = "";
$char = "";
$boldText ="";
$textHasWord ="";
$count ="";
$word ="";
//hàm cắt từ thành chữ
function str_split_unicode($str, $l = 0) {
	if ($l > 0) {
		$ret = array();
		$len = mb_strlen($str, "UTF-8");
		for ($i = 0; $i < $len; $i += $l) {
			$ret[] = mb_substr($str, $i, $l, "UTF-8");
		}
		return $ret;
	}
	return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}

//Hàm bôi đen các ký tự cần tìm
function GetBold($wordArr, $wordLeng , $char){
	$count=0;
	$newWordArr = [];
	//truyền vào mảng các từ đã cắt
	//duyệt từng từ để chuyển thành ký tự và so sánh
	for ($i=0; $i < $wordLeng; $i++) {
		$newWord = "";  
		$charArr = str_split_unicode($wordArr[$i] , count($wordArr[$i]));
		$charLeng = count($charArr);
		for ($j=0; $j < $charLeng; $j++) {
			if(IsChar($charArr[$j] , $char)){
				$count++;
				$newWord .="<span class='b'>";
				$newWord .=$charArr[$j];
				$newWord .="</span>";
			}
			else{
				$newWord.=$charArr[$j];
			}
		}
		array_push($newWordArr, $newWord);
	}
	$sumArr = [];
	array_push($sumArr, $newWordArr);
	array_push($sumArr, $count);
	return $sumArr;//trả về mảng chứa ký tự cần tìm đc bôi đen và số lượng ký tự cần tìm;
}
//Hàm bôi đen các ký tự cần tìm
function GetWord($wordArr, $wordLeng , $char){
	$newWordArr = [];
	$onlyWord = [];
	//truyền vào mảng các từ đã cắt
	//duyệt từng từ để chuyển thành ký tự và so sánh
	for ($i=0; $i < $wordLeng; $i++) {
		$count =0;
		$newWord = "";  
		$charArr = str_split_unicode($wordArr[$i] , count($wordArr[$i]));
		$charLeng = count($charArr);
		for ($j=0; $j < $charLeng; $j++) {
			if(IsChar($charArr[$j] , $char)){
				
				$count++;
				//array_push($onlyWord, $newWord);
				//break;
			}
		}
		if($count>0){
			$newWord .="<span class='b'>";
			$newWord .=$wordArr[$i];
			$newWord .="</span>";
			array_push($onlyWord, $newWord);
		}
		else{
			$newWord .=$wordArr[$i];
		}
		array_push($newWordArr, $newWord);
	}
	$sumArr = [];
	array_push($sumArr, $newWordArr);
	array_push($sumArr, $onlyWord);
	return $sumArr;//trả về mảng chứa ký tự cần tìm đc bôi đen và số lượng ký tự cần tìm;
}


//hàm so sánh
function IsChar($char , $charSearch){
	if($char === $charSearch){
		return true;
	}
	else{
		return false;
	}
}


if(isset($_POST['text']) && isset($_POST['char'])){
	$text = $_POST['text'];
	$char = $_POST['char'];
	$arr = explode(" ", $text);
	$leng = count($arr);

	//láy về mảng gồm text đã bôi đen và số lượng ký tự cần tìm
	$arr1  = GetBold($arr , $leng , $char);
	$boldText = implode(" ", $arr1[0]);
	$count = $arr1[1];

	//lấy về các từ chưa ký tự cần tìm

	$arr2  = GetWord($arr , $leng , $char);
	$textHasWord = implode(" ", $arr2[0]);
	$word = implode(',' , $arr2[1]);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		*{
			padding: 0px;
			margin:0px;
		}
		body{
			padding: 100px 100px;
		}
		#left{
			padding: 0px 20px;
			box-sizing: border-box;
			width: 45%;
			float: left;
			border-right: 1px solid;
		
		}
		#text{
			margin-top: 20px;
			width: 100%;
			float: left;
		}
		#char {
			margin-top: 20px;
			width: 100%;
			float: left;
		}
		#right{
			padding:00px 20px;
			height: 600px;
			background: #ffffff;
			width: 45%;
			float: left;
		}
		#right h2{
			margin-top: 20px;
			padding: 10px;
		}
		button{
			background-color: green;
			margin-top: 20px;
			padding: 5px 10px;
		}
		.rs{
			margin-top: 20px;
			border:1px solid navy;
			width: 95%;
			float: left;
			padding: 10px 5px;
		}
		.rs p{
			width: 100%;

		}
		label{
			font-weight: bold;
			padding: 10px 0px; 
			width: 100%;
			float: left;
		}
		.b{
			color: red;
		}
	</style>
</head>
<body>
	<form action="" method="POST">
		<section id="left">
			<h2 >Đoạn Văn</h2>
			<textarea name="text" id="text"  rows="10"><?=$text ?></textarea>
			<h2>Ký Tự</h2>
			<textarea name="char" id="char"  rows="4"><?=$char ?></textarea>
			<button type="submit">Phân tích nhé!</button>
		</section>
		<section id="right">
			<h2>Kết Quả</h2>
			<label>Số lần xuất hiện: </label>
			<div class="rs">
			<p><?=$count ?></p>
					
			</div>
			<label>Danh sách các từ: </label>
			<div class='rs'>
				<p><?=$word?></p>
			</div>
			<label>Đoạn văn : </label>
			<div class='rs'>
			<p ><?=$boldText ?></p>
			</div>
			<label>Đoạn văn 1: </label>
			<div class="rs">
			<p ><?=$textHasWord ?></p>
				
			</div>
			
		</section>
	</form>
</body>
</html>