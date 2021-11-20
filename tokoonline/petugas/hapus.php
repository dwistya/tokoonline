<?php 
    include "koneksi.php";
    $id_produk = $_GET['id_produk'];
    $folder = "gambar/";
    $sql = "select * from produk where id_produk = '$id_produk'";
    $query = mysqli_query($koneksi, $sql);
    $produk = mysqli_fetch_array($query);
    $path = $folder.$produk["foto_produk"];
    if(file_exists($path)){
      unlink($path);
    }

    $sql = "DELETE FROM produk WHERE id_produk= '$id_produk'";
    $result = mysqli_query($koneksi, $sql);

    if($result){
        echo "<script>alert('Sukses hapus buku');location.href='tampil_produk.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus buku');location.href='tambah_produk.php';</script>";
    }
    
?>