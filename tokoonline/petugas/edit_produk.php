<?php
 
   include "koneksi.php";
   $qry_get_produk = mysqli_query($koneksi, "select* from produk where id_produk = '".$_GET['id_produk']."'");
   $data=mysqli_fetch_array($qry_get_produk);

   include "navbar.php";
     
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Produk dengan gambar - Gilacoding</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: black;
      }
    button {
          background-color: black;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1><br>Edit Produk <?php echo $data['nama_produk']; ?></br></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id_produk" value="<?php echo $data['id_produk']; ?>"  hidden />
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" />
        </div>
        <div>
          <label>Harga</label>
         <input type="text" name="harga" required="" value="<?php echo $data['harga']; ?>"/>
        </div>
        <div>
          <label>Gambar Produk</label>
          <img src="gambar/<?php echo $data['foto_produk']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="foto_produk" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>