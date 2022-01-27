<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';
if (@$_SESSION['role_user' == "Admin"]) {
	header("location:index.php");
} elseif (@$_SESSION['role_user' == "Rumah Duka"]) {
	header("location:rumah_duka/rumah_duka.html");
} else {
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from tb_user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['role_user']=="Admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role_user'] = "Admin";
		// alihkan ke halaman dashboard admin
		header("location:index.php");

	// cek jika user login sebagai pegawai
	}else if($data['role_user']=="Rumah Duka"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['role_user'] = "user";
		// alihkan ke halaman dashboard pegawai
		header("location:login_user/index.php");
    }else{

		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");

	}	
}else{
	header("location:login.php");
}
}
?>