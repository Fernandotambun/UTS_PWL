<?php
    include "koneksi.php";
    $nama = $_POST['tnama']; //mengambil nilai nama melalui form dengan atribut tnama dan menyimpannya dalam variabel $nama
    $email = $_POST['temail'];
    $telp = $_POST['ttelp'];
    $password = $_POST['tpassword'];
    $user_role = $_POST['trole'];

    // Query cek apakah email sudah digunakan sebelumnya
    $cek_email = "SELECT * FROM user WHERE email='$email'";
    $result_cek_email = $conn->query($cek_email);

    if ($result_cek_email->num_rows > 0) {
        // Email sudah digunakan sebelumnya, tampilkan pesan error
        echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
    } else {
        // Email belum digunakan sebelumnya, insert data pengguna
        $sql = "INSERT INTO user (nama, email, telp, password, user_role) VALUES ('$nama', '$email', '$telp', '$password', '$user_role')";
        $result_insert = $conn->query($sql);

        if ($result_insert === TRUE) {
            header("location: mnj_user.php");
        } else {
            echo "Insert pengguna gagal: " . $conn->error;
        }
    }
    $conn->close();
?>