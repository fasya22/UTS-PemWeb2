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
    <title>My App</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./profile.css">
    <link rel="shortcut icon" href="./dasha.png">
    <link rel="manifest" href="JS/web.webmanifest">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Data Table CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <!-- GSAP Animation CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.3/gsap.min.js"></script>

    
      <style rel='stylesheet' type='text/css'>
      #install_button{margin: 10px;text-align: center; color: #fff;background: #56aff7;border: 1px solid #56aff7;padding: 5px 19px;cursor: pointer;font-size: 16px;border-radius: 12px;}
      #install_button:hover{color: blue;background: #fff;border: 1px solid #56aff7; }
      </style>

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

          <div class="card p-3 mt-4 shadow">
            <div class="card-body">
              <div class="card-title ">
                <div class="row justify-content-between">
                  <div class="col-md-4 col-sm-4 col-4">
                     <h4><b>Data Pegawai</b></h4>
                  </div>
                <div class="alert col-md-4 col-sm-4 col-4 text-center">
                      <?php 
                          if(!empty($_SESSION['message'])){
                              echo $_SESSION['message'];
                              $_SESSION['message'] = null;
                          }
                      
                      ?>    
                </div>
              </div>
                  <hr>
              </div>
              <div class="container mt-4 px-2">
                  <div class="table-responsive">
                      <table id = "table-data" class="table table-responsive table-borderless table-hover table-striped">
                          <thead>
                              <tr class="bg-light">
                                  <th scope="col" width="10%">No</th>
                                  <th scope="col" width="30%">NIP</th>
                                  <th scope="col" width="30%%">Nama</th>
                                  <th scope="col" width="30%">Alamat</th>
                                  <th scope="col" width="20%">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php $No= 1; while($row = pg_fetch_array($statement)):  ?>
                                <tr>
                                    <td><?= $No++ ?></td>
                                    <td><?= $row['nip']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                     <td><?= $row['alamat']; ?></td>
                                    <td>
                                      <a href="Backend/update_proses.php?id=<?= $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id']; ?>" ><i class=" ms-3 bi bi-pen text-primary"></i></a>
                                      <a href="Backend/delete_proses.php?id=<?= $row['id']; ?>" onclick="return confirm('the item will be permanently deleted, are you sure? ?')"><i class="bi bi-trash3 text-danger"></i></a>
                                    </td>      
                                </tr>

                                <!-- Start Modal -->
                                 <div class="modal fade" id="myModal<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Update Data Pegawai</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <?php 
                                            $id = $row['id'];
                                            $second_statement = pg_query($connection,"SELECT * FROM pegawai where id=$id");
                                            while($data= pg_fetch_array($second_statement)){ 
                                              $nip = $data['nip'];
                                              $nama = $data['nama'];
                                              $alamat = $data['alamat'];
                                            }
                                          ?>
                                          <form method="POST" action="Backend/update_proses.php">
                                            <div class="form-group mt-2">
                                              <label>NIP</label>
                                              <input type="hidden" name="id" value="<?php echo $id;?>">
                                              <input type="text" class="form-control" id ="nip" name ="nip" value="<?php echo $nip;?>" required>
                                            </div>
                                            <div class="form-group mt-2">
                                              <label for="nama">Nama</label>
                                              <input type="text" class="form-control" id ="nama" name ="nama" value="<?php echo $nama;?>" required>
                                            </div>
                                            <div class="form-group mt-2">
                                              <label for="prodi">Alamat</label>
                                              <input type="text" class="form-control" id ="alamat" name ="alamat" value="<?php echo $alamat;?>" required>
                                            </div>
                                            <div class="modal-footer mt-3">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                              <button type="submit" name="submit_update" class="btn" style="background-color: #0b115a; color: white;">Save Update</button>
                                            </div>
                                                
                                          </form>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Finish Modal -->
                              <?php endwhile; ?>  
                              
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
          </div>
          <button hidden=''  id='install_button'>Install Now</button>
        </div>
      </div>
    </div>

   
   
    
    <!-- Data Table Framework -->
    <script>
      $(document).ready(function(){
          $('#table-data').DataTable();
      });

      gsap.from("tr", {duration: 1, x: -100, opacity:0});
      gsap.from("h5 ", {duration: 1.5, y: -100, opacity:0});
      gsap.from("h6 ", {duration: 1, y: -100, opacity:0});
      gsap.from(".alert",{duration:0.5, x:100,opacity:0})
    </script>

    <script src="JS/register.js"></script>


    <b:if cond='data:blog.isMobileRequest == &quot;false&quot;'>
    <script type='text/javascript'>
      
    const installButton = document.getElementById("install_button");
    window.addEventListener("beforeinstallprompt", e => {
      e.preventDefault();
      deferredPrompt = e;
      installButton.style.display = 'block';
      installButton.hidden = false;
      installButton.addEventListener("click", installApp);});
     installButton.addEventListener('click',(e) => {
       deferredPrompt.prompt();
       installButton.disabled = true;
       deferredPrompt.userChoice.then(choiceResult => {
         if (choiceResult.outcome === "accepted") {
           installButton.hidden = true;
          }
          installButton.disabled = false;
          deferredPrompt = null;
        });

     });
       
    window.addEventListener("appinstalled", evt => {
      console.log("appinstalled fired", evt);});
    
    </script>
    </b:if>


    

    <!-- Framework Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
<!-- 
 -->
</body>
</html>

