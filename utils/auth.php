<?php
session_start();
if ($_SESSION['role'] !== 'VIP' || $_SESSION['role'] !== 'MEMBER') {
  if ($_SESSION['role'] === 'ADMIN') {
    header('Location: /admin');
    return;
  }

  if (empty($_SESSION))  {
    header("Location: /");
  }
}

if (isset($_POST['logout'])) {
  echo "<script>alert('Berhasil Logout')</script>";
  // echo "<script>localS</script>";
  session_destroy();
  session_unset();
  header("refresh:0;/");
}
