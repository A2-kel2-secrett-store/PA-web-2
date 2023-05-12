<?php
require("../../utils/auth-admin.php");
require "../../database/connect.php";

// Untuk button kirim
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = mysqli_query($connect, "UPDATE pembelian SET status = 'Sukses' WHERE id = '$id'");
  echo "<script> alert ('Pesanan berhasil dikirim')</script>";
}
?>
<!DOCTYPE html>
<html lang="en" class="light">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="/styles/output.css">
  <!-- diletakan di head berdasarkan arahan dari website resminya langsung [https://www.cssscript.com/html-table-sortable/] -->
  <script type="text/javascript" src="/scripts/sort-table.js"></script> 
</head>

<body>
  <?php require("../../components/sidebar-admin.php") ?>
  <div class="p-4 sm:ml-64">
    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5 antialiased">
      <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <table class="js-sort-table w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">Image</span>
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
              <th scope="col" class="px-6 py-3">
                Diskon
              </th>
              <th scope="col" class="px-6 py-3">
                Total
              </th>
              <th scope="col" class="px-6 py-3">
                Status
              </th>
              <th scope="col" class="px-6 py-3">
                Email
              </th>
              <th scope="col" class="px-6 py-3">
                Action
              </th>
            </tr>
          </thead>
          <tbody class="tbody">
            <?php
            $sql = mysqli_query($connect, "SELECT pembelian.*,users.email FROM pembelian INNER JOIN users ON pembelian.id_pembeli=users.id");
            while ($data = mysqli_fetch_assoc($sql)) { ?>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-32 p-4">
                  <img src="<?= $data['gambar'] ?>" alt="<?= $data['nama'] ?>">
                </td>
                <td class="px-6 py-4  text-gray-900 dark:text-white">
                  <?= $data['nama'] ?>
                </td>
                <td class="total px-6 py-4  text-gray-900 dark:text-white">
                  <?= $data['harga'] ?>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center space-x-3">
                    <div>
                      <div id="first_product" class="disabled bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?= $data['jumlah'] ?></div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4  text-gray-900 dark:text-white">
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
                    <div class="bg-orange-100 border text-center border-orange-600 text-orange-600 rounded-xl px-2 py-1">Proses</div>
                  <?php else : ?>
                    <div class="bg-green-100 border text-center border-green-600 text-green-600 rounded-xl px-2 py-1">Sukses</div>
                  <?php endif ?>
                </td>
                <td class="px-6 py-4  text-gray-900 dark:text-white">
                  <?= $data['email'] ?>
                </td>
                <td class="px-6 py-4  text-gray-900 dark:text-white">
                  <?php if ($data['status'] == "Proses") : ?>
                    <button data-id="${i}" class="send bg-blue-600 text-white px-3 py-1 rounded-lg"><a href="/admin/purchase/index.php?id=<?= $data['id'] ?>">Kirim</a></button>
                  <?php endif ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </section>
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
      total[i].innerHTML = currency(total[i].innerHTML);
    }
  </script>
  <script src="/scripts/cash.min.js"></script>
</body>

</html>