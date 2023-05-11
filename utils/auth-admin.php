<?php
session_start();
$uri = $_SERVER['REQUEST_URI'];

if ($_SESSION['role'] !== 'ADMIN') {
  if ($_SESSION['role'] === 'VIP' || $_SESSION['role'] === 'MEMBER') {
    header("Location: /home");
    return;
  }

  if (empty($_SESSION)) {
    header("Location: /");
  }
}

if (isset($_POST['logout'])) {
  echo "<script>alert('Berhasil Logout')</script>";
  // echo "<script>localS</script>";
  session_destroy();
  session_unset();
  header("Location: /");
}
