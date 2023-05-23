<?php
    include "koneksi.php";
    include "uploadFoto.php";
    $id = $_POST['tid']; //mengambil nilai ID yang dikirim melalui form dengan atribut tid dan menyimpannya dalam variabel $id
    $nama = $_POST['tnama'];
    $hrg = $_POST['thrg'];
    $ket = $_POST['tket'];
    $foto_lama=$_POST['foto_lama'];
    $stok = $_POST['tstk'];
    $qry=true;
    $flagFoto=true;
    if (isset($_POST['ubah_foto'])) { //memeriksa apakah checkbox di check
        if (upload_foto($_FILES["foto"])) { //memanggil fungsi upload_foto untuk upload foto
            $foto=$_FILES["foto"]["name"]; //mengambil nama file foto yang di-upload 
            $sql = "update barang set nama='$nama',hrg='$hrg',stok='$stok',keterangan='$ket',foto='$foto' where id='$id'";
        }else {
            $qry=false;
            echo "foto gagal diupload";
        }
    }else {
        $sql="update barang set nama='$nama',hrg='$hrg',stok='$stok',keterangan='ket' where id='$id'";
        $flagFoto=false;
    }
    if ($qry==true) {
        if($conn->query($sql)===TRUE) {
            if(is_file("img/".$foto_lama) && ($flagFoto==TRUE)) // jika gambar ada
                unlink("img/".$foto_lama);
            $conn->close();
            header("location:mnj_product.php");
        }else {
            $conn->close();
            echo "New record failed";
        }
    }
?>