<?php
if($_POST){
    $nama_petugas = $_POST["nama_petugas"];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];
    if(empty($nama_petugas)){
        echo "<script>alert('nama tidak boleh kosong');location.href='buat_akun.php';</script>";
 
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='buat_akun.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='buat_akun.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($koneksi,"insert into petugas (nama_petugas, username, password, level) value ('".$nama_petugas."','".$username."','".md5($password)."','".$level."')") or die(mysqli_error($koneksi));
        if($insert){
            echo "<script>alert('Sukses membuat akun');location.href='index.php';</script>";
        } else {
            echo "<script>alert('Gagal');location.href='buat_akun.php';</script>";
        }
    }
}
?>