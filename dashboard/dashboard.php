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
    <link rel="stylesheet" href="../assets/dashboard.css">

    <title>Dashboard</title>
    <style>
        .links {
            color: #333333;
            text-decoration: none;
        }

        .links:hover {
            color: #333333;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
        session_start();

        if(!isset($_SESSION['idCustomer'])){
            header("Location: ../login.php");
        }
    ?>
    <div class="sidenav">
        <a class="navbar-brand" href="../">Home Cinema</a>
        <div class="box active">
            <a class="links" href="dashboard.php">
                <img src="https://img.icons8.com/windows/20/333333/home-page.png">
                <span>Beranda</span>
            </a>
        </div>
        <div class="box">
            <a class="links" href="transaksi.php">
                <img src="https://img.icons8.com/windows/20/333333/shopping-basket-2.png">
                <span>Transaksi</span>
            </a>
        </div>
        <div class="box">
            <a class="links" href="profile.php">
                <img src="https://img.icons8.com/windows/20/333333/contract-job.png">
                <span>Profile anda</span>
            </a>
        </div>
        <div class="box">
            <a class="links" href="#logout" data-toggle="modal" data-target="#logout">
                <img src="https://img.icons8.com/windows/20/333333/exit.png">
                <span>Keluar</span>
            </a>
        </div>
    </div>

    <div class="content">
        <h2>Beranda</h2>
        <p class="p-kecil">Hai, pilih salah satu menu dibawah ini </p>
        <div class="row isi">
            <div class="col-3 menu">
                <img src="https://img.icons8.com/windows/64/0078D7/shopping-basket-2.png">
                <p class="p-normal"><a class="links" href="transaksi.php">Transaksi</a></p>
                <p class="p-kecil">Lihat transaksi yang anda lakukan</p>
            </div>
            <div class="col-3 menu">
                <img src="https://img.icons8.com/windows/64/0078D7/contract-job.png">
                <p class="p-normal"><a class="links" href="profile.php">Profile anda</a></p>
                <p class="p-kecil">Periksa data diri anda</p>
            </div>
            <div class="col-3 menu">
                <img src="https://img.icons8.com/windows/64/0078D7/exit.png">
                <p class="p-normal"><a class="links" href="#logout" data-toggle="modal" data-target="#logout">Keluar</a>
                </p>
                <p class="p-kecil">Sampai jumpa besok</p>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-sm" id="logout" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Konfirmasi</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p>Anda yakin ingin keluar?</p>
                </div>
                <div class="modal-footer text-center">
                    <form action="" method="post">
                        <button type="submit" class="btn btn-primary btn-sm" name="getout">Keluar</button>
                    </form>
                    <?php
                        include "../dao/dao.php";
                        $obj    = new mydata();

                        if(isset($_POST["getout"])){
                            $obj->logout();
                            echo '<meta http-equiv="refresh" content="0; url=../">';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

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