<?php

  include('./connection.php');

  $statement = pg_query($connection,"SELECT * FROM pegawai;");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./profile.css">
    <link rel="shortcut icon" href="./dasha.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Data Table CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <!-- GSAP Animation CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.3/gsap.min.js"></script>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #0b115a;">
      <div class="container d-flex bd-highlight">
        <a class="navbar-brand" href="index.php">My App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tambah.php">Tambah</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.html">Profil</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
          <div class="card mt-5 shadow">
            <div class="card-body">
                <form method="POST" action= "Backend/tambah_proses.php">
                        <div class="card-title ">
                                <h5><b>Tambah Data Pegawai</b></h5>
                                <hr>
                        </div>
                        <div class="form-group mt-2">
                            <p>NIP</p>
                            <input type="text" class="form-control" id ="nip" name ="nip" placeholder="Masukkan NIP . . . ." required>
                        </div>
                        <div class="form-group mt-2">
                            <p for="nama">Nama</p>
                            <input type="text" class="form-control" id ="nama" name ="nama" placeholder="Masukkan Nama ...." required>
                        </div>
                        <div class="form-group mt-2">
                            <p for="alamat">Alamat</p>
                            <input type="text" class="form-control" id ="alamat" name ="alamat" placeholder="Masukkan Alamat . . . ." required>
                        </div>

                        <div class="text-center mt-5">
                            <input type="submit" name="submit" class="btn" style="background-color: #0b115a; color: white;" value="SAVE" onclick="return confirm('Are you sure ?')">
                        </div>
                        
                    </div>
                </form>    
            </div>
          </div>
        </div>
      </div>
    </div>

   
   
    
    <!-- Data Table Framework -->
    <script>

      gsap.from("input", {duration: 1, x: 100, opacity:0});
      gsap.from("p", {duration: 0.8, x: -100, opacity:0});
      gsap.from("h5 ", {duration: 1.5, y: -100, opacity:0});
      gsap.from("h6 ", {duration: 1, y: -100, opacity:0});
    </script>

    <!-- Framework Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>