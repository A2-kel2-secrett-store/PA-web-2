<?php require('../utils/auth.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/styles/styleo.css">
  <link rel="stylesheet" href="/styles/stylevideo.css">
  <link rel="stylesheet" href="/styles/riview.css">
  <link rel="stylesheet" href="/styles/output.css">
  <title>Secrett Store</title>
</head>

<body>
  <section id="landing">
    <?php require('../components/nav.php') ?>
    <div class="parallax intro">
      <div class="cta">
        <div class="title"> WELCOME TO <br> SECRETT STORE</div>
      </div>
      <br>
      <br>
      <center>
        <h1 class="text-5xl">Welcome Back <span id="tampil"></span></h1>
      </center>
      <p class="fontkonten" style="text-align: center">
        Sekarang kamu bisa berbelanja dari rumah
        <br> saja tanpa perlu ribet loh
        <br> Para Secretters juga dapat melakukan scanning kulit dan konsultasi gratis.
      </p>
    </div>
    <div class="parallax content">
      <section class="about" id="about">
        <h1 class="heading"> <span> about</span> us </h1>

        <div class="row">
          <div class="video-container">
            <video src="/avideo/iklan.mp4" loop autoplay></video>
            <h3> choose your favorite skincare </h3>
          </div>
          <div class="content">
            <h3>why choose us?</h3>
            <p>Kami menyediakan berbagai jenis produk
              yang dapat menyesuaikan kebutuhan kulit Anda,
              mulai dari produk untuk kulit kering hingga
              kulit berminyak. Selain itu, kami memberikan
              pelayanan pelanggan yang ramah dan profesional,
              serta layanan konsultasi gratis untuk membantu Anda
              memilih produk yang tepat untuk kulit Anda.</p>
          </div>

        </div>

      </section>
    </div>
    <div class="parallax footer">
      <section class="review" id="review">
        <h1 class="heading"> customers <span>review</span></h1>
        <div class="box-container">
          <div class="box">
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>
            <p>Saya sangat merekomendasikan produk skincare ini kepada siapa saja
              yang mencari produk yang efektif, aman, dan ramah lingkungan untuk
              perawatan kulit mereka. Produk ini benar-benar
              memberikan hasil yang luar biasa dan saya sangat senang dengan pembelian saya</p>
            <div class="user">
              <img src="/gambar/ft2.png" alt="">
              <div class="user-info">
                <h3>Azzura</h3>
                <span>Happy Customer</span>
              </div>
            </div>
            <span class="fas fa-quote-right"></span>
          </div>

          <div class="box">
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>

            </div>
            <p>Saya sangat menyukai kemasan produk yang simpel dan elegan.
              Produk ini juga memiliki aroma yang lembut dan tidak
              mengganggu. Selama menggunakan produk ini, saya tidak
              mengalami iritasi atau efek samping negatif pada kulit saya</p>
            <div class="user">
              <img src="/gambar/ftxx.png" alt="">
              <div class="user-info">
                <h3>Deluna</h3>
                <span>Satisfied Customer</span>
              </div>
            </div>
            <span class="fas ai-quote"></span>
          </div>


        </div>

      </section>
    </div>


  </section>
  <footer>
    <marquee width="60%" direction="right"> Secrett Store</marquee>
    <div>
      <script src="/home.js"></script>
</body>



</html>