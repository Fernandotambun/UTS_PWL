<?php
    include "koneksi.php";
    
    // Ambil data pengguna dari database
    $id=$_GET['user_id'];
    $sql="select * from user where user_id='$id'";
    $hasil = $conn->query($sql);
    while ($row = $hasil->fetch_assoc()) {
        $id = $row['user_id'];
        $nama = $row['nama'];
        $email = $row['email'];
        $telp = $row['telp'];
        $password = $row['password'];
        $user_role = $row['user_role'];
    }


?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
</head>
<body style="background-image: url('https://media.istockphoto.com/id/880710798/id/vektor/pola-roti-vektor-kue-yang-mulus.jpg?s=612x612&w=0&k=20&c=lL1jQLhyxxrMzRKJpONbkwRlAtnm4bq2rDIhZXrlXaE=');">
    <div class="container-sm w-50 mb-3 mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Edit User</h5>
                <form action="updUsr.php" method='post'>
                    <div class="mb-3">
                        <input type='hidden' class="form-control" name='tid' value="<?=$id;?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type='text' class="form-control" name='tnama' value="<?=$nama;?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type='text' class="form-control" name='temail' value="<?=$email;?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type='text' class="form-control" name='ttelp' value="<?=$telp;?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type='text' class="form-control" name='tpassword' value="<?=$password;?>">
                    </div>
                          
                    <div class="mb-3">
                        <label for="user_role" class="form-label">Role Sekarang[ <?php if($user_role=="user"){
                                    echo "User";
                                }else if ($user_role=="admin") {
                                    echo "Admin";
                                }?>] :</label>
                        <select name="trole" class="form-control" id="trole">
                            <option>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </body>
</html>