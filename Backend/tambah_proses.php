<?php

    include('../connection.php');
    if(isset($_POST['submit'])){
        $nip= $_POST['nip'];
        $nama = ($_POST['nama']);
        $alamat = $_POST['alamat'];

        $statement = pg_query($connection,"INSERT INTO pegawai (nip,nama,alamat) VALUES('$nip','$nama','$alamat')");

        if($statement){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Successfully added data</div>' ;
            header("location:../index.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Failed to add data</div>' ;
            header("location:../index.php");
        }
    }

?>