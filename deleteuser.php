<?php
	session_start();
	$user=$_SESSION['username'];
	if (!isset($_SESSION['username'])){
		header("Location:./login.php");
	}
	include("connect.php");
	$id=$_GET['idk'];
	
	$delete_kelas="DELETE FROM login WHERE user ='$id'";
	mysqli_query($koneksi, $delete_kelas);
	header("Location:./user.php");
?>