<!DOCTYPE html>
<html lang="en">
<!-- s -->
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="/styles/login.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!-- body index -->
<body>
  <div class="container">
    <div class="login-container">
      <input id="item-1" type="radio" name="item" class="sign-in" checked><label for="item-1" class="item">Sign
        In</label>
      <input id="item-2" type="radio" name="item" class="sign-up"><label for="item-2" class="item">Sign Up</label>
      <div class="login-form">
        <form id="login" action="/database/sign_in.php" name="login" method="POST">
          <div class="sign-in-htm">
            <div class="group">
              <input placeholder="email" id="email" name="email" type="email" class="input" required>
            </div>
            <div class="group">
              <input placeholder="Password" id="pass2" name="password" type="password" class="input" data-type="password" autocomplete="off" required>
            </div>
            <div class="group">
              <button type="submit" name="submit" id="loginwe" class="button">Sign in</button>
            </div>
            <input hidden name="roleUser" />
            <input hidden name="username" />
            <div class="hr"></div>
            <div class="footer">
              <label for="item-2">Belum Memiliki Akun? Daftar</label>
            </div>
          </div>
        </form>
        <form name="daftar" action="/database/sign_up.php" id="daftar" method="POST">
          <div class="sign-up-htm">
            <div class="group" id="dftr">
              <input placeholder="Username" id="user1" type="text" name="username" class="input" required>
            </div>
            <div class="group">
              <input placeholder="Email adress" id="emailA" type="text" name="email" class="input" required>
            </div>
            <div class="group">
              <input placeholder="Password" id="pass1" type="password" name="password" class="input" data-type="password" required>
            </div>
            <div class="group">
              <input placeholder="Repeat password" id="pass0" name="repassword" type="password" class="input" data-type="password" required>
            </div>
            <div class="group">
              <button type="submit" name="submit" id="sign1" class="button">Sign Up</button>
            </div>
            <div class="hr"></div>
            <div class="footer">
              <label for="item-1">Sudah punya akun? Log in</a>
            </div>
          </div>
      </div>
    </div>
    </form>
    <script src="/scripts/cash.min.js"></script>
</body>

</html>