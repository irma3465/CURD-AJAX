<?php
include('koneksi.php');
$id = $_POST['id'];
mysqli_query($koneksi,"delete from user where user_id='$id'");
?>