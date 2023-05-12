<?php
require('../utils/auth.php');
require('../database/connect.php');

// mengambil data user yang login
$sql = mysqli_query($connect, "SELECT * FROM users WHERE email='$_SESSION[email]'");
$user = mysqli_fetch_assoc($sql);

// jika menekan tombol pengajuan
if (isset($_GET['pengajuan'])) {
  mysqli_query($connect, "UPDATE users SET pengajuan='Diminta' WHERE email='$_SESSION[email]'");
  echo "<script> alert ('Pengajuan berhasil dilakukan')</script>";
  header("refresh:0;/profile/");
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="/styles/styleo.css">
  <link rel="stylesheet" href="/styles/service.css">
  <link rel="stylesheet" href="/styles/output.css">
  <title>Secrett Store</title>
</head>

<body>
  <?php require("../components/nav.php") ?>
  <form action="../database/profile.php" name="profile" method="POST" enctype="multipart/form-data" class="container mx-auto mt-10 pb-10" id="service">
    <?php if ($user['role'] == 'MEMBER' && $user['pengajuan'] != 'Diminta') : ?>
      <div class="w-full mb-5 md:w-auto flex flex-col md:flex-row space-y-1 md:space-y-0 items-stretch md:items-center justify-start md:space-x-3 flex-shrink-0">
        <a href="/profile/index.php?pengajuan=Diminta" id="pengajuan" class="flex items-center justify-center text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">
          <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
          </svg>
          Ajukan VIP
        </a>
      </div>
    <?php elseif ($user['role'] == 'MEMBER' && $user['pengajuan'] = 'Diminta') : ?>
      <div class="w-full mb-5 md:w-auto flex flex-col md:flex-row space-y-1 md:space-y-0 items-stretch md:items-center justify-start md:space-x-3 flex-shrink-0">
        <p id="pengajuan" class="flex items-center justify-center text-gray-600 bg-gray-200 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">
          <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
          </svg>
          Sudah melakukan pengajuan VIP
        </p>
      </div>
    <?php endif ?>
    <label class="block mb-4" for="nama">
      <span class="text-gr font-semibold">Nama</span>
      <input value="<?= $user['username'] ?>" name="nama" required id="nama" type="text" class="mt-1 w-full block rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50" placeholder="">
    </label>
    <div aria-label="Gender">
      <div class="text-gr font-semibold">Jenis Kelamin</div>
      <div class="mt-2 flex items-center justify-start">
        <label class="mb-4 mr-4 inline-block" for="boy">
          <input value="Laki-laki" <?php if ($user['gender'] == "Laki-laki") echo 'checked'; ?> type="radio" id="boy" name="gender" class="rounded-full border-gray-300 text-pink-600 shadow-sm focus:border-pink-300 focus:ring focus:ring-offset-0 focus:ring-pink-200 focus:ring-opacity-50" />
          <span class="text-gray-700">Laki Laki</span>
        </label>
        <label class="block mb-4" for="girl">
          <input value="Perempuan" <?php if ($user['gender'] == "Perempuan") echo 'checked'; ?> type="radio" id="girl" name="gender" class="rounded-full border-gray-300 text-pink-600 shadow-sm focus:border-pink-300 focus:ring focus:ring-offset-0 focus:ring-pink-200 focus:ring-opacity-50" />
          <span class="text-gray-700">Perempuan</span>
        </label>
      </div>
    </div>
    <label class="block mb-4" for="age">
      <span class="text-gr font-semibold">Usia</span>
      <input name="age" required id="age" type="number" min="17" max="60" value="<?= $user['umur'] ?>" class="mt-1 w-full block rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50" placeholder="Isi Usia">
    </label>
    <label class="block mb-4" for="scan-date">
      <span class="text-gr font-semibold">Tanggal Scanning Kulit</span>
      <input name="scan-date" required id="scan-date" type="date" value="<?php echo $user['scan_date']; ?>" class="w-full mt-1 block rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50">
    </label>
    <label for="category" class="block mb-4">
      <span class="text-gr font-semibold">Kategori Skincare</span>
      <select name="category" required id="category" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50">
        <option value="" <?php if ($user["kategori"] == "") echo "selected"; ?>>-- Pilih Kategori Skincare ---</option>
        <option value="hot-deals" <?php if ($user["kategori"] == "hot-deals") echo "selected"; ?>>Hot Deals</option>
        <option value="new-release" <?php if ($user["kategori"] == "new-release") echo "selected"; ?>>New Release</option>
        <option value="popular" <?php if ($user["kategori"] == "popular") echo "selected"; ?>>Popular</option>
        <option value="cheapest" <?php if ($user["kategori"] == "cheapest") echo "selected"; ?>>Cheapest</option>
      </select>
    </label>
    <label for="type" class="block mb-4">
      <span class="text-gr font-semibold">Jenis Skincare</span>
      <select name="type" required id="type" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50">
        <option value="" <?php if ($user["tipe_skincare"] == "") echo "selected"; ?>>-- Pilih Jenis Skincare ---</option>
        <option value="sabun" <?php if ($user["tipe_skincare"] == "sabun") echo "selected"; ?>>Sabun</option>
        <option value="serum" <?php if ($user["tipe_skincare"] == "serum") echo "selected"; ?>>Serum</option>
        <option value="cream" <?php if ($user["tipe_skincare"] == "cream") echo "selected"; ?>>Cream</option>
        <option value="gel-spot" <?php if ($user["tipe_skincare"] == "gel-spot") echo "selected"; ?>>Gel-Spot</option>
      </select>
    </label>
    <label class="block mb-4" for="cond">
      <span class="text-gr font-semibold">Jelaskan Kondisi Kulit</span>
      <textarea rows="4" required name="cond" id="cond" class="mt-1 w-full block rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50" placeholder="Jelaskan Secara Rinci Permasalahannya"><?= $user['kondisi'] ?></textarea>
    </label>
    <label class="block mb-4" for="email">
      <span class="text-gr font-semibold">Email</span>
      <input disabled name="email" required id="email" type="text" class="mt-1 w-full block rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 disabled:text-gray-400 disabled:cursor-not-allowed" placeholder="" value="<?= $user['email'] ?>">
    </label>
    <span class="text-gr font-semibold">Foto Profil</span>
    <div class="relative w-max mb-4">
      <img id="profile-img" class="h-52" src="<?= $user['gambar'] == '' ? '/gambar/placeholder.jpg' : $user['gambar'] ?>" />
      <label class="block mb-4 absolute top-1 right-2" for="image">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-white hover:fill-pink-600 hover:scale-110">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
        </svg>
      </label>
    </div>
    <input name="image" id="image" type="file" accept="image/*" class="mt-1 hidden w-full rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 disabled:text-gray-400 disabled:cursor-not-allowed" placeholder="Silahkan ubah gambar">
    <?php if ($user['role'] === 'VIP') : ?>
      <div class="mb-4">
        <h3 class="text-gr font-bold text-xl">Level VIP</h3>
        <div class="star flex items-center"></div>
      </div>
    <?php endif ?>
    <button type="submit" name="submit" class="rounded-md px-3 py-1 font-bold text-white bg-pink-600 hover:bg-pink-700">Submit</button>
  </form>
  <script src="/scripts/cash.min.js"></script>
  <script src="/scripts/dayjs.min.js"></script>
  <script src="/profile/index.js"></script>
</body>

</html>