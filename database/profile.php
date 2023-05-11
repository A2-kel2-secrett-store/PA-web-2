<?php
require "../utils/auth.php";
require "connect.php";
if (isset($_POST['submit'])) {
    // bagian image (jika ada upload gambar maka kondisi ini dijalankan)
    if (!empty($_FILES['image'])) {
        if ($_FILES['image']['error']) {
            echo "Error: " . $_FILES['image']['error'] . "<br>";
        } else {
            $extention = array('jpg', 'jpeg', 'png');
            $file_ext = explode('.', $_FILES['image']['name']);
            $file_ext = end($file_ext);
            if (!in_array(strtolower($file_ext), $extention)) {
                echo "<script> alert ('File yang diupload tidak sesuai')</script>";
                header("refresh:0;/profile/");
                die;
            } else {
                $nama_file = $_FILES['image']['name'];
                $lokasi_gambar = $_FILES['image']['tmp_name'];
                $ukuran_gambar = $_FILES['image']['size'];
                $tipe_gambar = $_FILES['image']['type'];
                $error_gambar = $_FILES['image']['error'];
                $upload_gambar = move_uploaded_file($lokasi_gambar, "../gambar/" . $nama_file);
                if (!$upload_gambar) {
                    echo "<script> alert ('Data Gagal Disimpan')</script>";
                } else {
                    mysqli_query($connect, "UPDATE users SET gambar='/gambar/$nama_file' WHERE email='$_SESSION[email]'");
                }
            }
        }
    }

    $username = $_POST['nama'];
    $gender = $_POST['gender'];
    $umur = $_POST['age'];
    $scanDate = $_POST['scan-date'];
    $kategori = $_POST['category'];
    $type = $_POST['type'];
    $kondisi = $_POST['cond'];
    $email = $_SESSION['email'];

    mysqli_query($connect, "UPDATE users SET
        username = '$username',gender = '$gender',
        umur = $umur, scan_date = '$scanDate',
        kategori = '$kategori',kondisi = '$kondisi',
        tipe_skincare = '$type'
        WHERE email='$email'");
    
    echo "<script> alert ('Berhasil Ubah Profile')</script>";
    header("refresh:0;/profile/");
}