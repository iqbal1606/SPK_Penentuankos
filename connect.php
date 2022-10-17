<?php
	$host="localhost";
	$user="root";
	$pass="";
	$dbase="indekos";
	
	$koneksi=mysqli_connect($host,$user,$pass,$dbase);
	if(!$koneksi){
		die("Database mysql tidak terkoneksi");
	}
?>