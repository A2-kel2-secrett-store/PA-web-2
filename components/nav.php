<!-- s -->
<nav class="navbar">
  <div class="navbar-brand mx-auto container w-full flex items-center justify-between">
    <a class="font-bold" href="/home">SECRETT STORE
      <?php if ($_SESSION['role'] === 'vip') : ?>
        <span class="text-gr">VIP</span>
      <?php endif ?>
    </a>
    <ul>
      <li><a class="<?= $uri === "/home/" ? 'bg-pink-500 hover:bg-white pb-4 pt-2 rounded-lg' : ''  ?>" href="/home/">Home</a></li>
      <li><a class="<?= $uri === "/buy/" ? 'bg-pink-500 hover:bg-white pb-4 pt-2 rounded-lg' : ''  ?>" href="/buy/">Buy</a></li>
      <li><a class="<?= $uri === "/pesanan/" ? 'bg-pink-500 hover:bg-white pb-4 pt-2 rounded-lg' : ''  ?>" href="/pesanan/">Pesanan</a></li>
      <li><a class="<?= $uri === "/profile/" ? 'bg-pink-500 hover:bg-white pb-4 pt-2 rounded-lg' : ''  ?>" href="/profile/">Profile</a></li>
    </ul>
    <div class="relative inline-block group w-64">
      <span class="font-bold <?= $_SESSION['role'] === 'VIP' ? 'text-gr' : 'text-white' ?>  capitalize"><?= $_SESSION['username'] ?></span>
      <form action="" method="POST">
        <button name="logout" class="hidden absolute hover:bg-gray-300 left-0 text-red-500 font-semibold bg-gray-50 group-hover:block min-w-min shadow px-5 py-1 rounded-md" type="submit">Log out</button>
      </form>
    </div>
  </div>

</nav>