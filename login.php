<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['nama'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) { //Kode ini memeriksa apakah tombol submit diklik. Jika ya, maka proses akan dilanjutkan.
    $email = $_POST['email']; //Kode ini mengambil nilai yang dikirimkan melalui form dan menyimpan dalam variable
    $password = ($_POST['password']);
 
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'"; // utk mencari pengguna berdasarkan email dan password sesuai
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) { //utk meriksa setiap query ada email dan password yang dimasukkan valid, dan proses login akan dilanjutkan.
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['user_role'] = $row['user_role'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <title>Login Toko</title>
</head>
<body style="background-image: url('https://media.istockphoto.com/id/880710798/id/vektor/pola-roti-vektor-kue-yang-mulus.jpg?s=612x612&w=0&k=20&c=lL1jQLhyxxrMzRKJpONbkwRlAtnm4bq2rDIhZXrlXaE=');">

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <form action="" method="POST" >
              <h2 class="fw-bold mb-4 text-uppercase">Login</h2>

                <div class="form-floating mb-4">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                    <label for="floatingInput">Email</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="btn btn-primary btn-lg px-5" type="submit" name="submit">Login</button>
                
                </div>

                <div>

                <p class="mb-0">Anda belum punya akun? <a href="register.php" class="fw-bold">Register</a></p>

                </div>
              </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
</body>
</html>