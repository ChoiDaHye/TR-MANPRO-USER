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
        <div class="box">
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
        <div class="box active">
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
    <?php
        include "../dao/dao.php";
        $obj    = new mydata();
        $id     = $_SESSION['idCustomer'];
        $data   = $obj->profile_tampil($id);
    ?>
        <h2>Profile anda</h2>
        <p class="p-kecil">Data diri kamu dan atur kata sandi</p>
        <div class="isi">
            <p class="p-med">Informasi data diri</p>

            <form action="" method="post">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label p-reg">Nomor KTP</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control rounded-0 formku" name="noKtp"
                            value="<?php echo $data[1]; ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label p-reg">Nama lengkap</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control rounded-0 formku" name="nama"
                            value="<?php echo $data[0]; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label p-reg">Kontak</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control rounded-0 formku" name="kontak"
                            value="<?php echo $data[2]; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label p-reg">Alamat</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control rounded-0 formku" name="alamat"
                            value="<?php echo $data[3]; ?>">
                    </div>
                </div>
                <div class="form-group row" style="margin-top: 10px;">
                    <label for="inputPassword" class="col-sm-2 col-form-label p-reg">&nbsp;</label>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-secondaryku btn-block rounded-0" data-toggle="modal"
                            data-target=".modal1">Simpan perubahan</button>
                    </div>
                    <div class="modal fade bd-example-modal-sm modal1" tabindex="-1" role="dialog"
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
                                    <p>Simpan perubahan?</p>
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-dismiss="modal">Batal</button>
                                    <button type="submit" name="uptProfile"
                                        class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <p class="p-med" style="margin-top: 45px;">Ganti password</p>
            <form action="" method="post">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label p-reg">Password saat ini</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control rounded-0 formku" name="old_pass">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label p-reg">Password baru</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control rounded-0 formku" name="new_pass">
                    </div>
                </div>
                <div class="form-group row" style="margin-top: 10px;">
                    <label for="inputPassword" class="col-sm-2 col-form-label p-reg">&nbsp;</label>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-secondaryku btn-block rounded-0" data-toggle="modal"
                            data-target=".modal2">Proses</button>
                    </div>
                    <div class="modal fade bd-example-modal-sm modal2" tabindex="-1" role="dialog"
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
                                    <p>Simpan perubahan?</p>
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-dismiss="modal">Batal</button>
                                    <button type="submit" name="uptPassword"
                                        class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- MODAL NOTIFICATION -->
        <div class="modal fade bd-example-modal-sm" id="modalSuccess" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Pesan</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Perubahan tersimpan!</p>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-sm" id="modalFailed" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Pesan</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Gagal menyimpan perubahan!</p>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-sm" id="modalFailed2" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Pesan</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Gagal menyimpan perubahan!<br>Mohon periksa kembali data autentikasi anda!</p>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
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

        <?php
            if(isset($_POST["uptProfile"])){
                $databaru = $_POST;
                if($update = $obj->profile_edit($id, $databaru)){
        ?>
            <script type="text/javascript">
                $('#modalSuccess').modal('show');
            </script>
        <?php } else{ ?>
            <script type="text/javascript">
                $('#modalFailed').modal('show');
            </script>
        <?php }
            }

            if(isset($_POST["uptPassword"])){
                $old = $_POST['old_pass'];
                $new = $_POST['new_pass'];
        
                if($update = $obj->profile_pass($id, $old, $new)){
        ?>
            <script type="text/javascript">
                $('#modalSuccess').modal('show');
            </script>
        <?php } else{ ?>
            <script type="text/javascript">
                $('#modalFailed2').modal('show');
            </script>
        <?php }
            }
        ?>
    </div>
</body>

</html>