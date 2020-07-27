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
   <style>
      .konten {
         margin-top: -280px;
      }
   </style>
</head>

<body class="bg-light">
   <?php
      include "./dao/dao.php";
      $obj    = new mydata();
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
               <a class="nav-item nav-link active" href="#">Beranda <span class="sr-only">(current)</span></a>
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
      <!-- <div class="container"> -->
         <!-- <h1 class="display-4">Cari <span>VCD</span> yang mau <span>kamu</span> sewa</h1> -->

         <!-- Search panel -->
         <!-- <div class="search-panel rounded-pill">
            <input type=" text" name="cari" class="cari" placeholder="Judul film yang dicari">
            <a href="?jd=" class="cari-btn rounded-circle">
               <i class="fas fa-search"></i>
            </a>
         </div> -->
         <!-- End of search panel -->

      <!-- </div> -->
   </div>
   <!-- End of Jumbotron -->

   <!-- Content -->
   <?php $data   = $obj->vcd_tampil(); ?>
   <div class="container konten">
      <div class="row">
         <?php foreach($data as $r){ ?>
         <div class="col-md-3 col-sm-6">
            <div class="card mb-3 shadow-sm rounded-0">
               <?php if($r[1] == "0"){?>
               <svg class="bd-placeholder-img card-img-top" width="100%" height="380" xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c" /><text x="42%" y="50%" fill="#eceeef"
                     dy=".3em">Poster</text>
               </svg>
               <?php } else{?>
                  <img src="<?php echo $r[1]; ?>" alt="<?php echo $r[2]; ?>" class="poster1">
               <?php } ?>               
            </div>
            <div class="card-body bg-light detail">
               <p class="card-text judul"><a href="detail.php/?d=<?php echo $r[0]; ?>"><?php echo $r[2]; ?></a></p>
               <p class="card-text deskrip">Tersedia: <?php echo $r[3]; ?></p>
            </div>
         </div>
         <?php } ?>
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