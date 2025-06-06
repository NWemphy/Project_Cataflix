<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cataflix</title>
    <link href="<?= asset('css/style1.css') ?>" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: url("/gambar//Applications/XAMPP/xamppfiles/htdocs/Cataflix/public/gambar/gambarLogo-removebg-preview.png") no-repeat center center/cover;
            padding: 50px 0;
            background-attachment: fixed;
            background-position: center;
        }
    </style>
</head>

<body>
    <nav class="container-fluid navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #141414;">
        <a class="navbar-brand" href="#">
            <img src="<?= asset('gambar//Applications/XAMPP/xamppfiles/htdocs/Cataflix/public/gambar/gambarLogo-removebg-preview.png') ?>" alt="Cataflix Logo" style="height:40px;">
        </a>
        <div class="container-fluid text-center">
            <h1 style="color:rgb(236, 47, 9);">Your Movie, Your World</h1>
        </div>
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="/register" style="color: white;">Register</a>
            <a class="nav-link" href="/login" style="color: white;">Login</a>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <div class="intro text-center">
            <h1 style="color : #FFD700">Welcome to Cataflix</h1>
            <p>Nikmati katalog film dan serial terbaik dari berbagai genre, lengkap dengan fitur pencarian pintar dan rekomendasi personalisasi.</p>
            <div>
                <h4>Streaming 24/7</h4>
                <table class="mx-auto text-white">
                    <tr>
                        <td>Email</td>
                        <td>: support@cataflix.com</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>: +62 8080 8080</td>
                    </tr>
                </table>
                <div class="social-media mt-3">
                    <a href="#"><i class="fab fa-facebook-f text-white mx-2"></i></a>
                    <a href="#"><i class="fab fa-twitter text-white mx-2"></i></a>
                    <a href="#"><i class="fab fa-instagram text-white mx-2"></i></a>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col text-center">
            <img src="<?= asset('gambar/gambarLogo-removebg-preview.png.jpeg') ?>" class="img-fluid rounded" alt="Movie 1">
                <div class="col text-center">
            </div>
                <img src="<?= asset('gambar/moviePoster2.jpeg') ?>" class="img-fluid rounded" alt="Movie 2">
            </div>
            <div class="col text-center">
                <img src="<?= asset('gambar/moviePoster3.jpeg') ?>" class="img-fluid rounded" alt="Movie 3">
            </div>
        </div>

        <div class="announcement text-center mt-4 text-warning">
            <p><strong>Update:</strong> Film blockbuster terbaru akan tayang 15 Juni 2025! <i class="material-icons">&#xe8b5;</i></p>
        </div>

        <div class="membership-options row text-center text-white mt-5">
            <div class="col">
                <h2>Pilih Paket</h2>
            </div>
            <div class="col" id="one-month">
                <i class="fas fa-film fa-3x"></i>
                <h4>1 Bulan</h4>
            </div>
            <div class="col" id="three-months">
                <i class="fas fa-star fa-3x"></i>
                <h4>3 Bulan</h4>
            </div>
            <div class="col" id="six-months">
                <i class="fas fa-star-half-alt fa-3x"></i>
                <h4>6 Bulan</h4>
            </div>
        </div>

        <div class="menu text-center mt-4">
            <a href="/login" class="btn btn-lg" style="background-color: #E50914; color: white; width: 300px; font-size: 28px; border-radius: 10px;">Tonton Sekarang</a>
        </div>
    </div>

    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>