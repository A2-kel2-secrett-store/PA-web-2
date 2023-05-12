<?php
require("../../utils/auth-admin.php");
require "../../database/connect.php";
// Untuk jadikan VIP
if (isset($_POST['btnSubmit'])) {
  $email = $_POST['select'];
  $sql = mysqli_query($connect, "UPDATE users SET role='VIP' WHERE email = '$email'");
  echo "<script> alert ('Role berhasil diubah')</script>";
  header("refresh:0;/admin/vip");
}
if (isset($_POST['select'])){
  $sql = mysqli_query($connect,"SELECT * FROM users WHERE email='$_POST[select]'");
  $selected = mysqli_fetch_assoc($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="/styles/output.css">
</head>

<body>
  <?php require("../../components/sidebar-admin.php") ?>
  <div class="p-4 sm:ml-64">
    <form method="POST" action="" name="vip">
      <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
          <label for="select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
          <select id="select" name="select" onchange="this.form.submit()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Silahkan pilih akun" required>
            <option selected>-- Pilih User ---</option>
            <?php
            $sql = mysqli_query($connect, "SELECT * FROM users WHERE role='MEMBER' AND kategori!=''");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
              <option value="<?= $data['email'] ?>" <?php echo (isset($_POST['select'])) ? ($_POST['select'] == $data['email']) ? "selected" : "" : "" ?>>
                <?= $data['username'] ?> - <?= $data['email'] ?>
              </option>
            <?php
            }
            ?>
          </select>
        </div>
        <div>
          <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Skin Care</label>
          <input disabled value="<?= isset($selected) ? $selected['tipe_skincare'] : "" ?>" type="text" id="type" class="bg-gray-50 disabled:text-gray-400 cursor-not-allowed border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pilih Users Dulu">
        </div>
        <div>
          <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
          <input disabled value="<?= isset($selected) ? $selected['kategori'] : "" ?>" type="text" id="category" class="bg-gray-50 disabled:text-gray-400 cursor-not-allowed border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pilih Users Dulu">
        </div>
        <div>
          <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
          <input disabled value="<?= isset($selected) ? $selected['umur'] : "" ?>" type="number" id="age" class="bg-gray-50 disabled:text-gray-400 cursor-not-allowed border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pilih User Dulu">
        </div>
      </div>
      <button type="submit" name="btnSubmit" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Jadikan VIP</button>
    </form>
  </div>
  <script src="/scripts/cash.min.js"></script>
</body>
</html>