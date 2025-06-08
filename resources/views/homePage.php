<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cataflix</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding-top: 80px;
    }

    .navbar-brand span {
      font-weight: bold;
      font-size: 1.5rem;
    }

    .flix {
      color: #007bff;
    }

    .search-form {
      width: 500px;
      max-width: 90vw; /* responsive di layar kecil */
    }

    .search-bar {
      width: 100%; /* input memenuhi form */
      max-width: none; /* hilangkan max-width lama */
    }

    .movie-hero {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      margin-bottom: 40px;
    }

    .movie-hero img {
      border-radius: 10px;
      width: 100%;
      max-width: 400px;
      height: 600px; /* atau tinggi yang diinginkan */
      object-fit: cover; /* agar gambar tetap proporsional */
    }

    .movie-description {
      padding-left: 30px;
    }

    .movie-description h2 {
      font-weight: bold;
    }

    .rating i {
      color: gold;
    }

    .btn-watchlist {
      background-color: transparent;
      border: 1px solid white;
      color: white;
      margin: 10px 0;
    }

    .new-releases img {
      width: 100%;
      border-radius: 10px;
      margin: 10px 0;
      border: 2px solid #6f42c1;
    }

    footer {
      margin-top: 60px;
      border-top: 1px solid #333;
      padding-top: 20px;
      text-align: center;
    }

    .social-icons a {
      color: white;
      margin: 0 10px;
      font-size: 20px;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #141414;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <span>Cata<span class="flix">flix</span></span>
      </a>
      <form class="form-inline mx-auto search-form">
        <input class="form-control search-bar" type="search" placeholder="Search" aria-label="Search" />
      </form>
      <div class="ml-auto">
        <a href="/watchlist" class="btn btn-outline-light btn-sm mr-2">Watchlist</a>
        <a class="btn btn-danger btn-sm mr-2">Trending Now</a>
        <a href="/login" class="btn btn-outline-light btn-sm">Log in</a>
      </div>
    </div>
  </nav>

  <!-- Hero Carousel -->
  <div id="heroCarousel" class="carousel slide mb-5" data-ride="carousel">
    <div class="carousel-inner">

      <!-- Slide 1: Lilo & Stitch -->
      <div class="carousel-item active">
        <div class="container">
          <div class="row movie-hero">
            <div class="col-md-5">
              <img src="<?= asset('gambar/lilo_stitch.jpeg') ?>" alt="Lilo & Stitch" />
            </div>
            <div class="col-md-7 movie-description">
              <h2>Lilo & Stitch</h2>
              <p class="rating">
                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i> 8.2/10
              </p>
              <button class="btn btn-watchlist"><i class="fas fa-plus"></i> Add to Watchlist</button>
              <p><strong>Review:</strong> 2025 | Family</p>
              <h5 class="text-warning mt-3">Synopsis</h5>
              <p>Seorang gadis Hawaii bernama Lilo mengadopsi makhluk asing yang menyamar sebagai anjing.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 2: Kung Fu Panda 4 -->
      <div class="carousel-item">
        <div class="container">
          <div class="row movie-hero">
            <div class="col-md-5">
              <img src="<?= asset('gambar/kungfu_panda_4.jpeg') ?>" alt="Kung Fu Panda 4" />
            </div>
            <div class="col-md-7 movie-description">
              <h2>Kung Fu Panda 4</h2>
              <p class="rating">
                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                <i class="fas fa-star"></i><i class="fas fa-star"></i> 9.0/10
              </p>
              <button class="btn btn-watchlist"><i class="fas fa-plus"></i> Add to Watchlist</button>
              <p><strong>Review:</strong> 2025 | Animation</p>
              <h5 class="text-warning mt-3">Synopsis</h5>
              <p>Po kembali untuk petualangan kungfu terbaru yang epik melawan musuh baru yang misterius.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 3: Elemental -->
      <div class="carousel-item">
        <div class="container">
          <div class="row movie-hero">
            <div class="col-md-5">
              <img src="<?= asset('gambar/elemental.jpeg') ?>" alt="Elemental" />
            </div>
            <div class="col-md-7 movie-description">
              <h2>Elemental</h2>
              <p class="rating">
                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                <i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i> 7.8/10
              </p>
              <button class="btn btn-watchlist"><i class="fas fa-plus"></i> Add to Watchlist</button>
              <p><strong>Review:</strong> 2024 | Fantasy</p>
              <h5 class="text-warning mt-3">Synopsis</h5>
              <p>Sebuah kota di mana elemen hidup berdampingan, hingga cinta muncul antara air dan api.</p>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Controls -->
    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
  </div>

  <!-- New Releases -->
  <div class="container">
    <h4 class="text-white">New Releases</h4>
    <div class="row new-releases">
      <div class="col-md-3 col-6">
        <img src="<?= asset('gambar/the_jungle_book.jpeg') ?>" alt="The Jungle Book" />
      </div>
      <div class="col-md-3 col-6">
        <img src="<?= asset('gambar/the_croods.jpeg') ?>" alt="The Croods" />
      </div>
      <!-- Tambahkan lagi jika ada film baru -->
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-white">
    <div class="container">
      <p>Email : support@cataflix.com</p>
      <p>Contact : +62 8214418 3516</p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>