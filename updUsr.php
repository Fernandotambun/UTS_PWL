<?php
    include "koneksi.php";
    $id = $_POST['tid'];
    $nama = $_POST['tnama'];
    $email = $_POST['temail'];
    $telp = $_POST['ttelp'];
    $password = $_POST['tpassword'];
    $user_role = $_POST['trole'];
    
    // Query update data pengguna
    $sql = "UPDATE user SET nama='$nama', email='$email', telp='$telp', password='$password', user_role='$user_role' WHERE user_id='$id'";
    $result = $conn->query($sql);
    $conn->close();
    
    if ($result === TRUE) {
        header("location: mnj_user.php");
    } else {
        echo "Update pengguna gagal: " . $conn->error;
    }
?>