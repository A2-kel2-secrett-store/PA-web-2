<?php
require("../utils/auth.php");
require "../database/connect.php";

// jika menekan tombol batal pesanan
if (isset($_GET['id'])) {
  $sql = mysqli_query($connect, "DELETE FROM pembelian WHERE id=$_GET[id]");
  echo "<script> alert ('Pesanan Berhasil dibatalkan')</script>";
  header("refresh:0;/pesanan");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/promo.css">
  <link rel="stylesheet" href="/styles/styleo.css">
  <link rel="stylesheet" href="/styles/output.css">
  <title>Promo </title>
</head>

<body>

  <?php require("../components/nav.php") ?>
  <div class="bdprm">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class=" text-center px-6 py-3">
              Gambar
            </th>
            <th scope="col" class="px-6 py-3">
              Barang
            </th>
            <th scope="col" class="px-6 py-3">
              Harga Satuan
            </th>
            <th scope="col" class="px-6 py-3">
              Qty
            </th>
              <th scope="col" class="px-6 py-3 text-center">
                Diskon
              </th>
            <th scope="col" class="px-6 py-3">
              Total
            </th>
            <th scope="col" class="px-6 py-3 text-center">
              Status
            </th>
            <th scope="col" class="px-6 py-3">
            </th>
          </tr>
        </thead>
        <tbody class="tbody">
          <?php
          $sql = mysqli_query($connect, "SELECT * FROM pembelian WHERE id_pembeli = '$_SESSION[id]'");
          while ($data = mysqli_fetch_array($sql)) { ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="w-32 p-4">
                <img src="<?= $data['gambar'] ?>" alt="<?= $data['nama'] ?>">
              </td>
              <td class="px-6 py-4  text-gray-900 dark:text-white">
                <?= $data['nama'] ?>
              </td>
              <td class="harga px-6 py-4 text-gray-900 dark:text-white">
                <?= $data['harga'] ?>
              </td>
              <td class="px-6 py-4">
                <div class="flex items-center space-x-3">
                  <div>
                    <div id="first_product" class="disabled bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= $data['jumlah'] ?></div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                <?php if ($data['diskon'] == "true") : ?>
                  <div class="bg-green-100 border border-green-600 text-green-600 rounded-xl px-2 py-1">Diskon 10%</div>
                <?php endif ?>
              </td>
              <td class="total px-6 py-4 font-semibold text-gray-900 dark:text-white">
                <?= $data['total'] ?>
              </td>
              <td class="px-6 py-4 text-gray-900 dark:text-white">
                <?php
                if ($data['status'] == "Proses") : ?>
                  <div class="bg-orange-100 border border-orange-600 text-orange-600 rounded-xl px-2 py-1">Proses</div>
                <?php else : ?>
                  <div class="bg-green-100 border border-green-600 text-green-600 rounded-xl px-2 py-1">Sukses</div>
                <?php endif ?>
              </td>
              <?php
              if ($data['status'] == "Proses") : ?>
                <td class="px-6 py-4">
                  <a href="/pesanan/index.php?id=<?= $data['id'] ?>" class="font-medium bg-gray-50 text-red-600 dark:text-red-500 hover:underline">Cancel</a>
                </td>
              <?php else : ?>
                <td class="px-6 py-4"></td>
              <?php endif ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    function currency(duit) {
      return Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
      }).format(parseFloat(duit));
    }
    harga = document.querySelectorAll('.harga')
    total = document.querySelectorAll('.total')
    for (var i = 0; i < total.length; i++) {
      harga[i].innerHTML = currency(harga[i].innerHTML);
      total[i].innerHTML = currency(total[i].innerHTML);
    }
  </script>
  <script src="/scripts/cash.min.js"></script>
</body>
<html>