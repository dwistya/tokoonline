<?php
if($_POST){
    $username=$_POST['username'];
    $password=$_POST['password'];

        include "koneksi.php";
        $qry_login=mysqli_query($koneksi,"select * from pelanggan where username = '".$username."' and password = '".md5($password)."'");
        if(mysqli_num_rows($qry_login)>0){
            $dt_login=mysqli_fetch_array($qry_login);
            session_start();
            $_SESSION['id_pelanggan']=$dt_login['id_pelanggan'];
            $_SESSION['nama']=$dt_login['nama'];
            $_SESSION['status_login']=true;
            header("location: home.php");
            echo "<script>alert('Login Berhasil');location.href='home.php';</script>";
        } else {
            echo "<script>alert('Username dan Password tidak benar');location.href='index.php';</script>";
        }
    }

?>