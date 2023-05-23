<?php
    include "koneksi.php";
    $id=$_GET['id'];//mengambil nilai ID yang diberikan sebagai parameter dalam URL menggunakan metode $_GET 
    $sql="select * from barang where id='$id'"; //untuk mengambil data dari tabel "barang" berdasarkan ID yang diberikan
    $hasil=$conn->query($sql);
    while ($row=$hasil->fetch_assoc()) { //ngeloop setiap baris data disimpan pada array $row
        $nama=$row['nama'];
        $hrg=$row['hrg'];
        $keterangan=$row['keterangan'];
        $foto=$row['foto'];
        $stok=$row['stok'];
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
</head>
<body>
    <div class="container-sm w-50 mb-3 mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Edit barang</h5>
                <form action="updBrg.php" method='post' enctype='multipart/form-data'>
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type='text' class="form-control" name='tid' value="<?=$id;?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type='text' class="form-control" name='tnama' value="<?=$nama;?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type='text' class="form-control" name='thrg' value="<?=$hrg;?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type='text' class="form-control" name='tket' value="<?=$keterangan;?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type='file' class="form-control" name='foto'>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jml Stok</label>
                        <input type='text' class="form-control" name='tstk' value="<?=$stok;?>">
                    </div>
                    <div class="mb-3">
                        <input type='hidden' name='foto_lama' value="<?=$foto;?>">
                        <img class="border border-5" src="img/<?php echo $foto; ?>" width="150px" height="120px" />
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </body>
</html>