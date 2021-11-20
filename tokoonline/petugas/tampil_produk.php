<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
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
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: black;
        border: solid 1px #DDEEEE;
        color: white;
        padding: 10px;
        text-align: left;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
        background-color: white;
    }
    a {
          background-color: black;
          color: white;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
  <?php
  include('navbar.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
?>
  <body>
    <center><h1><br>Data Produk</br></h1><center>
    <center><a class="btn btn-dark" href="tambah_produk.php" role="button">+ Tambah Produk</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Dekripsi</th>
          <th>Harga</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM produk ORDER BY id_produk ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_produk']; ?></td>
          <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
          <td>Rp <?php echo $row['harga']; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['foto_produk']; ?>" style="width: 120px;"></td>
          <td>
              <a class="btn btn-dark" href="edit_produk.php?id_produk=<?php echo $row['id_produk']; ?>" role="button">Edit</a> |
              <a class="btn btn-dark" href="hapus.php?id_produk=<?php echo $row['id_produk']; ?>" role="button"  onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>