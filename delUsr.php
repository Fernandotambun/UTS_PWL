<?php
    include "koneksi.php";
    $id = $_GET['user_id'];
    $sql = "delete from user where user_id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("location:mnj_user.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
?>
