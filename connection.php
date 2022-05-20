<?php
session_start();
$host = 'ec2-52-4-104-184.compute-1.amazonaws.com';
$port = '5432';
$user = 'slpxnnzofehowv'; 
$password = '528942adbfe625702807c771279d2b3a260012e0659e1a5ca33ccbe661c1fca9';
$db   = 'db2gse3o78oh50';

$connection = pg_connect("host=$host port =$port dbname=$db user=$user password=$password");
// if($connection){
// echo 'Koneksi Berhasil';
// }
// else{
// echo 'Koneksi Gagal';
// }
// ?>