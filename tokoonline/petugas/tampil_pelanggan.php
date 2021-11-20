<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>DATA PELANGGAN</h1>
                <form method="POST" action="proses_pelanggan.php" class="d-flex">
                    <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="card-body">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAMA </th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">TELP</th>
                    <th scope="col">USERNAME</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "koneksi.php";
                    if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        $query_pl = mysqli_query($koneksi, "select * from pelanggan where id_pelanggan = '$cari'");
                    }
                    else{
                        $query_pl = mysqli_query($koneksi, "select * from pelanggan");
                    }
                    while($data_pl = mysqli_fetch_array($query_pl)){
                ?>
                    <tr>
                        <td><?=$data_pl['id_pelanggan']?></td>
                        <td><?=$data_pl['nama']?></td>
                        <td><?=$data_pl['alamat']?></td>
                        <td><?=$data_pl['telp']?></td>
                        <td><?=$data_pl['username']?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>