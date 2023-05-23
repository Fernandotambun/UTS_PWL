<?php 
 
session_start();
 
if (!isset($_SESSION['nama'])) { //jika nama tidak ada dalam sesi, kondisi ini akan menjadi benar.
    header("Location: login.php");
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - Toko Makmur Jaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
</head>
<body style="background-image: url('https://media.istockphoto.com/id/880710798/id/vektor/pola-roti-vektor-kue-yang-mulus.jpg?s=612x612&w=0&k=20&c=lL1jQLhyxxrMzRKJpONbkwRlAtnm4bq2rDIhZXrlXaE=');">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <i class="fab fa-github fa-2x mx-3 ps-1"></i> 
      <a class="navbar-brand" href="#">TSMS</a>
    </a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <?php if ($_SESSION['user_role'] != "admin") { //memeriksa apakah nilai dari variabel sama dengan admin
                    echo '<li><a class="nav-link" href="#">Contact</a></li>';
                }else{
                    ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Menu Admin</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="mnj_product.php">Manajemen Produk</a></li>
                <li><a class="dropdown-item" href="mnj_user.php">Manajemen User</a></li>
              </ul>
          </li>
          <?php }?>
      </ul>
  
      <ul class="navbar-nav d-flex flex-row ms-auto me-5">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle me-5" href="#" data-bs-toggle="dropdown" aria-expanded="false"><img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="rounded-circle" height="22"
              alt="" loading="lazy" /> </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Nama : <?=$_SESSION['nama']?></a></li>
                <li><a class="dropdown-item" href="#">Role : <?=$_SESSION['user_role']?></a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
          </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data Barang</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="insBrg.php" method='post' enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type='text' class="form-control" name='tnama'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type='text' class="form-control" name='thrg'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type='text' class="form-control" name='tket'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type='file' class="form-control" name='foto'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jml Stok</label>
                        <input type='text' class="form-control" name='tstk'>
                    </div>
                    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" >Simpan</button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="container">
        <div class="card-body my-custom-scrollbar ">
            
        </form>
        <div class="container mt-5">
          <div class="card" >
            <div class="card-body">
              <h5 class="card-title">List Product</h5>
            <?php
                include "koneksi.php";
                $sql = "SELECT * from barang ORDER BY id";//untuk mengambil semua data dari tabel barang dalam urutan berdasarkan kolom id
                $hasil = $conn->query($sql);
                echo "<a href='addBrg.php' data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-primary mb-2 mt-5'>Tambah Data</a>";
                if ($hasil->num_rows>0) { 
                    echo "<table class='table'> 
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Foto</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
                    while ($row=$hasil->fetch_assoc()) { //ngeloop setiap baris data disimpan pada array $row
                        $teks="<tr>";
                        $teks.="<td>".$row["id"]."</td>";
                        $teks.="<td>".$row["nama"]."</td>";
                        $teks.="<td>".$row["hrg"]."</td>";
                        $teks.="<td>".$row["keterangan"]."</td>";
                        $teks.="<td><img src='img/".$row["foto"]."' style='width:100px;height:100px;' class='img-thumbnail'></img></td>";
                        $teks.="<td>".$row["stok"]."</td>";
                        $teks.="<td><a href='editBrg.php?id=".$row["id"]."' class='btn btn-warning'>Edit</a>
                        <a href='delBrg.php?id=".$row["id"]."' class='btn btn-danger'' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a></td>";
                        $teks.="</tr>";
                        echo $teks;
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<br>";
                    echo "jml rec:0";
                }
                $conn->close();
            ?>
          </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
