<?php
    include "koneksi.php";
    include "uploadFoto.php";
    $nama = $_POST['tnama']; //mengambil nilai ID yang dikirim melalui form dengan atribut name tid dan menyimpannya dalam variabel $id
    $hrg = $_POST['thrg'];
    $ket = $_POST['tket'];
    $stok = $_POST['tstk'];

    if (upload_foto($_FILES["foto"])) { //memanggil fungsi upload_foto untuk upload foto
        $foto=$_FILES["foto"]["name"];//mengambil nama file foto yang di-upload 
        $sql = "insert into barang (nama,hrg,stok,keterangan,foto) values ('$nama',$hrg,$stok,'$ket','$foto')";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            header("location:mnj_product.php");
        } else {
            $conn->close();
            echo "New records failed";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

?>