<?php

    include('../connection.php');
    if(isset($_POST['submit_update'])){
        $id = $_POST['id'];
        $nip = $_POST['nip'];
        $nama= $_POST['nama'];
        $alamat = $_POST['alamat'];

        $statement = pg_query($connection,"UPDATE pegawai set nip='$nip', nama='$nama',
        alamat='$alamat' WHERE id=$id");

        if($statement){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Successfully update data</div>' ;
            header("location:../index.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Failed to update data</div>' ;
            header("location:../index.php");
        }

    }
?>