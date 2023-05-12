<?php require('../utils/auth.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/styleo.css">
  <link rel="stylesheet" href="/styles/buystyle.css">
  <link rel="stylesheet" href="/styles/output.css">
  <title>Beli </title>
</head>

<body>
  <section id="landing">
    <?php require('../components/nav.php') ?>
    <br>
    <br><br>
    <br>
    <div class="hero-container container mx-auto pb-20">
      <div class="grid grid-cols-1 w-full md:grid-cols-2 lg:grid-cols-3 gap-5 justify-between" id="items">
        <div class="flex items-center justify-center h-screen ">
          <svg class="animate-spin -ml-1 mr-3 h-20 w-20 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
          </svg>
        </div>

        <div class="max-w-sm hidden bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <a class="flex items-center justify-center w-full" href="#">
            <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
          </a>
          <div class="p-5 h-max">
            <a href="#">
              <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
            </a>
            <div class="font-bold mb-2 text-gr text-xl line-through">Rp. Loading</div>
            <div class="flex flex-col justify-between h-fulll">
              <p class="mb-3 line-clamp-4 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            </div>
            <div class="flex items-center justify-between mb-3">
              <div class="flex flex-col">
                <label for="amount">Jumlah</label>
                <input id="amount" value="1" min="1" max="99" class="w-16 rounded-lg shadow-sm" type="number">
              </div>
              <div class="flex flex-col">
                <label class="font-bold text-gr" for="disc">Diskon VIP!</label>
                <select class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50">
                  <option>Loading...</option>
                  <option>GERRR</option>
                  <option>GERRR</option>
                  <option>GERRR</option>
                </select>
              </div>
            </div>
            <button class="btn-beli rounded-lg bg-pink-600 text-white px-3 py-1 w-full font-bold text-lg">Beli Sekarang</button>
          </div>
        </div>
      </div>
    </div>
    <script src="/scripts/cash.min.js"></script>
    <script>
      const email = "<?= $_SESSION['email'] ?>"
      const role = "<?= $_SESSION['role'] ?>"
    </script>
    <script type="module" src="/buy/index.js"></script>
</body>

</html>