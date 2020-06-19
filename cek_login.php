<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include("koneksi.php");

// menangkap data yang dikirim dari form login
$username = $_REQUEST['username'];
$password =md5 ($_REQUEST['password']);

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);
	$_SESSION['nama'] = $data["nama_user"];
		// buat session login dan username
		$_SESSION['username'] 	= $username;
		$_SESSION['id'] 		= $data["id_user"];
		$_SESSION['level']		=$data["level"];
	
		// alihkan ke halaman dashboard admin
		header("location:dashboard.php?module=home");
}else{
	header("location:index.php?pesan=gagal");
}

?>