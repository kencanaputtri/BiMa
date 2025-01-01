<?php
include "koneksi.php";

$username = $_POST['username'];
$npm = $_POST['npm'];
$email = $_POST['email'];
$pass = $_POST['password'];  // Fixed
$telp = $_POST['no_telp'];  // Fixed

$simpan = mysqli_query($koneksi, "INSERT INTO user(npm, username, pass, email, no_telp) 
    VALUES ('$npm', '$username', '$pass', '$email', '$telp')");

$koneksi->close();
?>
<script>
	document.location='home.php'
</script>