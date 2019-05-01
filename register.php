<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$ad = $_POST['ad'];
	$soyad = $_POST['soyad'];
	$email = $_POST['email'];
	$sifre = $_POST['sifre'];
	
	$sifre = password_hash($sifre, PASSWORD_DEFAULT);
	
	require_once 'connect.php';
	
	$sql = "INSERT INTO login_info (ad,soyad,email,sifre) VALUES ('$ad','$soyad','$email','$sifre')";

	if( mysqli_query($conn, $sql) ){
		$result["success"] = "1";
		$result["message"] = "success";
		
		echo json_encode($result);
		mysqli_close($conn);
		
	}else {
		
		$result["success"] = "0";
		$result["message"] = "error";
		
		echo json_encode($result);
		mysqli_close($conn);
	}
}

?>