<?php
    include "koneksi.php";
    $id=$_GET['id'];

    $sql = "select foto from barang where id='$id'";
    $hasil=$conn->query($sql);
    while($row=$hasil->fetch_assoc()){
        $foto=$row['foto'];
    }
    if ($foto!="") {
        unlink("img/".$foto);
    }
    $sql = "delete from barang where id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("location:mnj_product.php");
    }
    $conn->close();
    echo "New records failed";
?>