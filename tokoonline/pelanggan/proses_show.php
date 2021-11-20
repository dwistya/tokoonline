<?php
include "koneksi.php";

$sql = "SELECT * FROM pelanggan";
$result = $koneksi->query($sql);

foreach($result as $result){
    $id_pelanggan = $result ["id_pelanggan"];
    $nama = $result ["nama"];
    $alamat = $result ["alamat"];
    $telp = $result ["telp"];
    $username = $result ["username"];
}
?>