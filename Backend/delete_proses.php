<?php

    include('../connection.php');

    if(isset($_GET['id'])){
        $id= $_GET['id'];

        $statement = pg_query($connection,"DELETE FROM pegawai where id=$id");

        if($statement){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Successfully delete data</div>' ;
            header("location:../index.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Failed to delete data</div>' ;
            header("location:../index.php");
        }

    }

?>