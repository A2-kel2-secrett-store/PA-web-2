<?php
require "connect.php";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if ($password === $repassword) {
        $password = md5($password);
        $insert = mysqli_query($connect, "INSERT INTO users (username,email,password,role,gambar) VALUES ('$username','$email','$password','MEMBER','/gambar/placeholder.jpg')");
        if (!$insert) {
            echo "<script> alert ('Data gagal tersimpan')</script>";
        } else {
            echo "<script> alert ('Daftar akun berhasil')</script>";
            header("refresh:0;/");
        }
    } else {
        echo "<script> alert('Password dan Konfirmasi Password Tidak sama')</script>";
        header("refresh:0;/");
    }
}