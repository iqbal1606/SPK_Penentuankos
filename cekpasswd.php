<?php
	session_start();
	include("connect.php");
	$username=$_POST['username'];
	$password=$_POST['password'];
	$tipe=$_POST['tipe'];
	$sql_user = "select * from login where user='$username' and password=md5('$password') and status='$tipe'";
	$hasil_user = mysqli_query($koneksi, $sql_user);
	$rowcount = mysqli_num_rows($hasil_user);
	if ($rowcount == 1) {
		$user = mysqli_fetch_array($hasil_user);
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $user['nama'];
		$_SESSION['alamat'] = $user['alamat'];
		$_SESSION['telepon'] = $user['no_telepon'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['status'] = $user['status'];
		header("Location: halutama.php");
	}
	else
	{
		header("Location:./login.php?msg=Username atau password yang anda masukkan salah");
	}
?>