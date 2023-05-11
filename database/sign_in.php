<?php
require "connect.php";
session_start();
if (isset($_POST['submit'])) {
    $sql = mysqli_query($connect, "SELECT * FROM users");

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_login = false;
    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            if ($row["email"] == $_POST["email"] && $row["password"] == md5($_POST["password"])) {
                echo "<script> alert ('Login Berhasil')</script>";
                $_SESSION['username'] = $row["username"];
                $_SESSION['email'] = $row["email"];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row["role"];
                $is_login = true;
                if ($row["role"] == "ADMIN") {
                    header("refresh:0;/admin");
                } else {
                    header("refresh:0;/home");
                }
            }
        }
        if(!$is_login){
            echo "<script> alert ('Akun Tidak Terdaftar')</script>";
            header("refresh:0;/");
        }
    } else {
        echo "<script> alert ('Akun Tidak Terdaftar')</script>";
        header("refresh:0;/");
    }
}
