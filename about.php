<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/styles.css">

    <title>Home Cinema</title>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Home Cinema</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="./">Beranda</a>
                    <a class="nav-item nav-link active" href="#">Tentang <span class="sr-only">(current)</span></a>
                    <?php
                        session_start();

                        if(isset($_SESSION['idCustomer'])){
                            echo '<a class="nav-item tombol btn btn-primary rounded-pill" href="./dashboard/dashboard.php">Dashboard</a>';
                        } else{
                            echo '<a class="nav-item tombol btn btn-primary rounded-pill" href="login.php">Login</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- End of Navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Tentang <span>Home Cinema</span></h1>
        </div>
    </div>
    <!-- End of Jumbotron -->

    <!-- Content -->
    <div class="container konten-2">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card rounded-0">
                    <div class="card-body tentang">
                        <img src="https://img.icons8.com/windows/64/0078D7/info.png" />
                        <h5 class="card-title">Apa itu Home Cinema</h5>
                        <p class="card-text">Home Cinema merupakan sebuah layanan penyewa VCD terletak 
di Jl. Genteng No. xx, Kota x, Jawa Tengah yang menyediakan 
kemudahanan dalam transaksi serta harga yang terjangkau. 
Kami menyediakan jutaan VCD yang siap untuk disewakan dengan
kualitas video jernih dan original. Terdapat puluhan genre 
dan kelengkapan VCD dari film lama sampai dengan film terbaru
yang dapat dinikmati oleh semua kalangan. Hal ini yang membuat
Home Cinema menjadi layanan penyewa VCD pilihan terbaik dan 
terpercaya oleh masyarakat.</p>
                        <p class="card-text">
                        Kenapa memilih Home Cinema?
Karena kami berfokus pada customer satisfaction yaitu menyediakan 
kemudahan bagi customer yang ingin melakukan penyewaan VCD. 
Customer dapat melakukan pengecekan terkait informasi VCD
yang tersedia di toko kami kapan dan dimana saja tanpa mengharuskan
ke toko untuk melakukan pengecekan. Customer juga akan diberikan 
sebuah akun yang berguna untuk memantau data transaksi VCD yang 
dilakukan oleh customer.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card rounded-0">
                    <div class="card-body tentang">
                        <img src="https://img.icons8.com/windows/64/0078D7/refund-2.png" />
                        <h5 class="card-title">Bagaimana cara transaksinya</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed
                            semper mi. Nunc sit amet turpis porta, maximus nunc ut, lacinia lacus. Aenean sit amet
                            consectetur turpis. Praesent sapien est, faucibus sed eros in, aliquam molestie dolor.
                            Aliquam a lacinia mauris. Fusce hendrerit bibendum nunc iaculis sagittis. Donec non massa eu
                            leo tempor sagittis vitae eget magna. Morbi vulputate turpis ut justo auctor, sit amet
                            luctus risus efficitur. Sed neque lectus, elementum a aliquet sit amet, convallis eget
                            libero. Aliquam sed pulvinar felis.</p>
                        <p class="card-text">
                            Nam laoreet sit amet elit at semper. Donec hendrerit rhoncus augue, sit amet tempor sem
                            rhoncus et. Pellentesque gravida nunc quis lorem dapibus, et semper odio iaculis. Morbi
                            vehicula ultricies neque sit amet volutpat. Pellentesque egestas sapien sed mauris
                            consectetur, vulputate interdum neque gravida. Ut eleifend est arcu. Quisque commodo nunc
                            mattis augue volutpat condimentum. Vivamus diam felis, lacinia non viverra ut, ultrices
                            pharetra erat. Sed ligula neque, lacinia vel semper sed, cursus congue ligula. In massa
                            arcu, tempor quis tempus vitae, maximus lacinia mi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Content -->

    <!-- Footer -->
    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="text-muted">&copy;2020 Home Cinema</span>
        </div>
    </footer>
    <!-- End ofFooter -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>