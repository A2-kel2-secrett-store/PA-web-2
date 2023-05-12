<?php // untuk pembelian pada halaman member
require "connect.php";
session_start();
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jumlah = $_POST['total'];
    $harga = $_POST['harga'];
    $total = $_POST['total'] * $_POST['harga'];
    $gambar = $_POST['gambar'];
    $sql = mysqli_query($connect,"SELECT id FROM users WHERE email = '$_SESSION[email]'");
    $id = mysqli_fetch_array($sql)[0];
    if($_SESSION['role'] == "VIP"){
        $diskon = $total * (10/100);
        $total = $total - $diskon;
        echo "<script> alert ('Berhasil mendapatkan diskon 10%')</script>";
        $sql = mysqli_query($connect,"INSERT INTO pembelian (nama,jumlah,harga,total,gambar,status,id_pembeli,diskon) VALUES 
    ('$nama',$jumlah,$harga,$total,'$gambar','Proses',$id,'true')") ;
    } else {
        $sql = mysqli_query($connect,"INSERT INTO pembelian (nama,jumlah,harga,total,gambar,status,id_pembeli) VALUES 
    ('$nama',$jumlah,$harga,$total,'$gambar','Proses',$id)") ;
    }
    echo "<script> alert ('Berhasil Beli 😆')</script>";
    header("refresh:0;/buy");
}
