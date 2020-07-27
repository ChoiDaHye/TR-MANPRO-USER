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
    <?php
        include "./dao/dao.php";
        $obj    = new mydata();
        $id = "";

        if(isset($_GET['d'])) {
            $id = $_GET['d'];
        } else{
            echo '<meta http-equiv="refresh" content="0; url=./">';
        }

        $data = $obj->vcd_detail($id);
    ?>
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
                    <a class="nav-item nav-link" href="./">Beranda <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="./about.php">Tentang</a>
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

    </div>
    <!-- End of Jumbotron -->

    <!-- Content -->
    <div class="container konten-3">
        <div class="row d-flex justify-content-center">
            <div class="card mb-4 rounded-0" style="min-width: 950px; max-width: 950px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?php echo $data[0]; ?>" title="<?php echo $data[1]; ?>" class="poster2">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Judul</h5>
                            <p class="card-text" style="padding-bottom: 10px;"><?php echo $data[1]; ?></p>
                            <h6 class="card-title">Tanggal rilis</h6>
                            <p class="card-text" style="padding-bottom: 10px;"><?php echo $data[2]; ?></p>
                            <h6 class="card-title">Genre</h6>
                            <p class="card-text" style="padding-bottom: 10px;"><?php echo $data[3]; ?></p>
                            <h6 class="card-title">Bahasa</h6>
                            <p class="card-text" style="padding-bottom: 10px;"><?php echo $data[4]; ?></p>
                            <h6 class="card-title">Tersedia</h6>
                            <p class="card-text"><?php echo $data[5]; ?></p>
                        </div>
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