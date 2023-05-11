<?php
require("../utils/auth-admin.php");
require "../database/connect.php";

$sql = mysqli_query($connect,"SELECT COUNT(id) AS lenUsers FROM users WHERE role!='ADMIN'");
$lenUsers = mysqli_fetch_row($sql);
$sql = mysqli_query($connect,"SELECT COUNT(id) AS lenUsers FROM users WHERE role='VIP'");
$lenUsersVip = mysqli_fetch_row($sql);
$sql = mysqli_query($connect,"SELECT COUNT(id) AS lenPesanan FROM pembelian");
$lenPesanan = mysqli_fetch_row($sql);
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
    <?php require("../components/sidebar-admin.php") ?>
    <div class="p-4 sm:ml-64">
    <main class=" pt-16 max-h-screen overflow-auto">
      <div class="px-6 py-8">
        <div class="max-w-4xl mx-auto">
          <div class="bg-white rounded-3xl p-8 mb-5">
            <h1 class="text-3xl font-bold mb-10">Halo Admin 😆</h1>
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-x-2">
                <button type="button" class="inline-flex items-center justify-center h-9 px-3 rounded-xl border hover:border-gray-400 text-gray-800 hover:text-gray-900 transition">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
                    <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z" />
                  </svg>
                </button>
                <button type="button" class="inline-flex items-center justify-center h-9 px-5 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition">
                  Open
                </button>
              </div>
            </div>
            <hr class="my-10">
            <div class="grid grid-cols-2 gap-x-20">
              <div>
                <h2 class="text-2xl font-bold mb-4">Stats</h2>
                <div class="grid grid-cols-2 gap-4">
                  <div class="col-span-2">
                    <div class="p-4 bg-green-100 rounded-xl">
                      <div class="font-bold text-xl text-gray-800 leading-none">Good day, <br>Aila</div>
                      <div class="mt-5">
                        <a href="/admin/purchase" class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition">
                          Lihat Pesanan
                        </a>
                      </div>
                    </div>
                  </div>
                  <a href="/admin/users/" class="p-4 bg-yellow-100 rounded-xl text-gray-800">
                    <div class="font-bold text-2xl leading-none" id="users"><?= $lenUsers[0] ?></div>
                    <div class="mt-2">Users</div>
                  </a>
                  <div class="p-4 bg-yellow-100 rounded-xl text-gray-800">
                    <div class="font-bold text-2xl leading-none" id="vip"><?= $lenUsersVip[0] ?></div>
                    <div class="mt-2">VIP Users</div>
                  </div>
                  <a href="/admin/purchase/" class="col-span-2">
                    <div class="p-4 bg-purple-100 rounded-xl text-gray-800">
                      <div class="font-bold text-xl leading-none">Pesanan</div>
                      <div class="mt-2" id="purchases"><?= $lenPesanan[0] ?> Pesanan</div>
                    </div>
                  </a>
                </div>
              </div>
              <div>
                <h2 class="text-2xl font-bold mb-4">Your tasks today</h2>
                <div class="space-y-4">
                  <div class="p-4 bg-white border rounded-xl text-gray-800 space-y-2">
                    <div class="flex justify-between">
                      <div class="text-gray-400 text-xs">Number 10</div>
                      <div class="text-gray-400 text-xs">4h</div>
                    </div>
                    <a href="javascript:void(0)" class="font-bold hover:text-yellow-800 hover:underline">UTS Web</a>
                    <div class="text-sm text-gray-600">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="text-gray-800 inline align-middle mr-1" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                      </svg>Deadline is 13th Apr
                    </div>
                  </div>
                  <div class="p-4 bg-white border rounded-xl text-gray-800 space-y-2">
                    <div class="flex justify-between">
                      <div class="text-gray-400 text-xs">Personal</div>
                      <div class="text-gray-400 text-xs">7d</div>
                    </div>
                    <a href="javascript:void(0)" class="font-bold hover:text-yellow-800 hover:underline">Mudik</a>
                    <div class="text-sm text-gray-600">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="text-gray-800 inline align-middle mr-1" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                      </svg>New feedback
                    </div>
                  </div>
                  <div class="p-4 bg-white border rounded-xl text-gray-800 space-y-2">
                    <div class="flex justify-between">
                      <div class="text-gray-400 text-xs">Personal</div>
                      <div class="text-gray-400 text-xs">2h</div>
                    </div>
                    <a href="javascript:void(0)" class="font-bold hover:text-yellow-800 hover:underline">Bukber</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script src="/scripts/cash.min.js"></script>
  <!-- <script src="/admin/index.js"></script> -->
</body>

</html>