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

        include "../dao/dao.php";
        $obj    = new mydata();
        $id     = $_SESSION['idCustomer'];
        $datapjm= $obj->trans_jalan($id);
        $datakbl= $obj->trans_selesai($id);
    ?>
    <div class="sidenav">
        <a class="navbar-brand" href="../">Home Cinema</a>
        <div class="box">
            <a class="links" href="dashboard.php">
                <img src="https://img.icons8.com/windows/20/333333/home-page.png">
                <span>Beranda</span>
            </a>
        </div>
        <div class="box active">
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
        <h2>Transaksi</h2>
        <p class="p-kecil">Lihat transaksi yang anda lakukan</p>
        <div class="row isi">
            <p class="p-normal">Transaksi berjalan</p>
            <table class="table table-sm table-bordered">
                <?php if($datapjm ==  false){ ?>
                <tbody>
                    <tr>
                        <td><span class="badge badge-secondary">Tidak ada transaksi berjalan</span></td>
                    </tr>
                </tbody>
                <?php } else{ ?>
                <thead>
                    <tr>
                        <th scope="col" style="text-align:center; width:5%">#</th>
                        <th scope="col" colspan="2" style="width:35%">No. Transaksi</th>
                        <th scope="col" style="text-align:center; width:15%">Tanggal</th>
                        <th scope="col" style="text-align:center; width:15%">Jatuh tempo</th>
                        <th scope="col" style="text-align:center; width:15%">Total harga</th>
                        <th scope="col" style="text-align:center; width:15%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datapjm as $r){ ?>
                    <tr>
                        <th scope="row" style="text-align:center"><?php echo $r[0]; ?></th>
                        <td><?php echo $r[1]; ?></td>
                        <td style="text-align:center"><button type="button" class="btn btn-secondary btn-sm"
                                data-toggle="modal" data-target="<?php echo '#modal'.$r[1]; ?>">Detail</button></td>
                        <td style="text-align:center"><?php echo $r[2]; ?></td>
                        <td style="text-align:center"><?php echo $r[3]; ?></td>
                        <td style="text-align:center"><?php echo 'Rp. '.number_format($r[4],2,',','.'); ?></td>
                        <td style="text-align:center">
                            <?php 
                                if($r[6] == 0){
                                    echo '<span class="badge badge-success">'.$r[5].'</span>';
                                } else if($r[6] == 1){
                                    echo '<span class="badge badge-warning">'.$r[5].'</span>';
                                } else if($r[6] == 2){
                                    echo '<span class="badge badge-danger">'.$r[5].'</span>';
                                }
                            ?>
                        </td>
                    </tr>
                    <div class="modal fade bd-example-modal-md" id="<?php echo 'modal'.$r[1]; ?>" tabindex="-1"
                        role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Detail transaksi</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group list-group-horizontal-sm rounded-0">
                                        <li
                                            class="list-group-item list-group-item-dark rounded-0 col-sm-4 text-center d-inline-block">
                                            Judul</li>
                                        <li
                                            class="list-group-item list-group-item-dark rounded-0 col-sm-2 text-center d-inline-block">
                                            QTY</li>
                                        <li
                                            class="list-group-item list-group-item-dark rounded-0 col-sm-4 text-center d-inline-block">
                                            Subtotal</li>
                                        <li
                                            class="list-group-item list-group-item-dark rounded-0 col-sm-2 text-center d-inline-block">
                                            Back</li>
                                    </ul>
                                    <?php
                                            $datapjm_d= $obj->trans_jalan_det($r[1]);
                                            foreach($datapjm_d as $q){
                                        ?>
                                    <ul class="list-group list-group-horizontal-sm rounded-0">
                                        <li class="list-group-item rounded-0 col-sm-4 text-center d-inline-block">
                                            <p class="p-kecil"><?php echo $q[0];?></p>
                                        </li>
                                        <li class="list-group-item rounded-0 col-sm-2 text-center d-inline-block">
                                            <p class="p-kecil"><?php echo $q[1];?></p>
                                        </li>
                                        <li class="list-group-item rounded-0 col-sm-4 text-center d-inline-block">
                                            <p class="p-kecil"><?php echo 'Rp. '.number_format($q[2],2,',','.'); ?></p>
                                        </li>
                                        <li class="list-group-item rounded-0 col-sm-2 text-center d-inline-block">
                                            <p class="p-kecil"><?php echo $q[3];?></p>
                                        </li>
                                    </ul>
                                    <?php } ?>
                                </div>
                                <div class="modal-footer text-center">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </tbody>
                <?php } ?>
            </table>

            <p class="p-normal">Transaksi selesai</p>
            <table class="table table-sm table-bordered">
                <?php if($datakbl ==  false){ ?>
                <tbody>
                    <tr>
                        <td><span class="badge badge-secondary">Tidak ada transaksi</span></td>
                    </tr>
                </tbody>
                <?php } else{ ?>
                <thead>
                    <tr>
                        <th scope="col" style="text-align:center; width:5%">#</th>
                        <th scope="col" colspan="2" style="width:35%">No. Transaksi</th>
                        <th scope="col" style="text-align:center; width:30%">Total harga</th>
                        <th scope="col" style="text-align:center; width:30%">Todal denda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datakbl as $r){ ?>
                    <tr>
                        <th scope="row" style="text-align:center"><?php echo $r[0]; ?></th>
                        <td><?php echo $r[1]; ?></td>
                        <td style="text-align:center"><button type="button" class="btn btn-secondary btn-sm"
                                data-toggle="modal" data-target="<?php echo '#modal2'.$r[1]; ?>">Detail</button></td>
                        <td style="text-align:center"><?php echo 'Rp. '.number_format($r[2],2,',','.'); ?></td>
                        <td style="text-align:center"><?php echo 'Rp. '.number_format($r[3],2,',','.'); ?></td>
                    </tr>
                    <div class="modal fade bd-example-modal-md" id="<?php echo 'modal2'.$r[1]; ?>" tabindex="-1"
                        role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Detail transaksi</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group list-group-horizontal-sm rounded-0">
                                        <li
                                            class="list-group-item list-group-item-dark rounded-0 col-sm-4 text-center d-inline-block">
                                            Judul</li>
                                        <li
                                            class="list-group-item list-group-item-dark rounded-0 col-sm-2 text-center d-inline-block">
                                            QTY</li>
                                        <li
                                            class="list-group-item list-group-item-dark rounded-0 col-sm-2 text-center d-inline-block">
                                            BAD</li>
                                        <li
                                            class="list-group-item list-group-item-dark rounded-0 col-sm-4 text-center d-inline-block">
                                            Subdenda</li>
                                    </ul>
                                    <?php
                                            $datakbl_d= $obj->trans_selesai_det($r[1]);
                                            foreach($datakbl_d as $q){
                                        ?>
                                    <ul class="list-group list-group-horizontal-sm rounded-0">
                                        <li class="list-group-item rounded-0 col-sm-4 text-center d-inline-block">
                                            <p class="p-kecil"><?php echo $q[0];?></p>
                                        </li>
                                        <li class="list-group-item rounded-0 col-sm-2 text-center d-inline-block">
                                            <p class="p-kecil"><?php echo $q[1];?></p>
                                        </li>
                                        <li class="list-group-item rounded-0 col-sm-2 text-center d-inline-block">
                                            <p class="p-kecil"><?php echo $q[2];?></p>
                                        </li>
                                        <li class="list-group-item rounded-0 col-sm-4 text-center d-inline-block">
                                            <p class="p-kecil"><?php echo 'Rp. '.number_format($q[3],2,',','.'); ?></p>
                                        </li>
                                    </ul>
                                    <?php } ?>
                                </div>
                                <div class="modal-footer text-center">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </tbody>
                <?php } ?>
            </table>
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
</body>

</html>