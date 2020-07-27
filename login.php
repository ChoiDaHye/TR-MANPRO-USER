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
        session_start();

        if(isset($_SESSION['idCustomer'])){
            header("Location: ./dashboard/dashboard.php");
        }
    ?>
    <div class="card mx-auto rounded-0" style="width: 25rem; margin-top: 7%;">
        <div class="card-body tentang">
            <h5 class="card-title logo">Home Cinema</h5>
            <form action="" method="post">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label style="font-weight: 500; text-align: center; display: block; padding-bottom: 10px;">Login
                            customer</label>
                        <input type="text" class="form-control formku rounded-0" placeholder="Username" name="user">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="password" class="form-control formku rounded-0" placeholder="Password" name="pass">
                        <small class="form-text text-muted" style="margin-top: 20px;">
                            Belum punya akun?<br>Silahkan daftar melalui outlet Home Cinema
                        </small>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary col-sm-12 rounded-0" name="login">Masuk</button>
                    </div>
                </div>
            </form>
            <?php
                include "./dao/dao.php";
                $obj    = new mydata();

                if(isset($_POST["login"])) {
                    $u = $_POST['user'];
                    $p = $_POST['pass'];
                    $login = $obj->login($u, md5($p));

                    if($login == false){
                        echo "<div class='alert alert-danger' role='alert'>Autentikasi gagal!</div>";
                    }
                }
            ?>
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