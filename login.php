<?php
session_start();
require "functions.php";


if (isset($_SESSION["role"])) {
  $role = $_SESSION["role"];
  if ($role == "Admin") {
    header("Location: admin/home.php");
  } else {
    header("Location: user/maintanace.php");
  }
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $cariadmin = query("SELECT * FROM admin_212279 WHERE 212279_email = '$username' AND 212279_password = '$password'");
  $cariuser = query("SELECT * FROM user_212279 WHERE 212279_email = '$username' AND 212279_password = '$password'");

  if ($cariadmin) {
    // set session
    $_SESSION['username'] = $cariadmin[0]['212279_nama'];
    $_SESSION['role'] = "Admin";
    header("Location: admin/home.php");
  } else if ($cariuser) {
    // set session
    $_SESSION['email'] = $cariuser[0]['212279_email'];
    $_SESSION['id_user'] = $cariuser[0]['212279_id_user'];
    $_SESSION['role'] = "User";
    header("Location: user/maintanace.php");
  } else {
    echo "<div class='alert alert-warning'>Username atau Password salah</div>
    <meta http-equiv='refresh' content='2'>";
  }
}


?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Login Sport Hall Karpan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts (optional, for better typography) -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
  
  <style>
   body {
  margin: 0;
  min-height: 100vh;
  font-family: 'Montserrat', Arial, sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;

  /* style img login */
  background-image: url('img/is.jpg');
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  background-attachment: fixed;
}

/* Login card dengan latar putih transparan agar kontras */
.login-card {
  background: rgba(255, 255, 255, 0.95);
  border-radius: 20px;
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
  padding: 40px 30px;
  width: 100%;
  max-width: 370px;
  margin: 40px 0;
  position: relative;
  overflow: hidden;
}

/* Judul login */
.login-card h1 {
  font-size: 2.2rem;
  font-weight: 700;
  color:rgb(16, 215, 230);
  margin-bottom: 24px;
  text-align: center;
  letter-spacing: 1px;
}

/* Label form */
.form-label {
  color:rgb(19, 184, 206);
  font-weight: 500;
}

/* Input form */
.form-control {
  border-radius: 10px;
  padding: 12px;
  font-size: 1rem;
  border: 1px solidrgb(15, 203, 228);
  transition: border-color 0.3s ease;
}

.form-control:focus {
  border-color: #00796b;
  outline: none;
  box-shadow: 0 0 8px #43e97b;
}

/* Tombol login dengan gradient biru */
.btn-login {
  background: linear-gradient(90deg,rgb(16, 155, 197) 0%,rgb(36, 127, 155) 100%);
  color: #fff;
  border: none;
  border-radius: 10px;
  padding: 12px;
  width: 100%;
  font-size: 1.1rem;
  font-weight: 600;
  transition: background 0.3s;
  margin-top: 12px;
  cursor: pointer;
}

.btn-login:hover {
  background: linear-gradient(90deg,rgb(5, 203, 238) 0%,rgb(6, 234, 241) 100%);
  color: #fff;
}

/* Link lupa password dan signup */
.forgot-link, .signup-link {
  display: block;
  color:rgb(245, 57, 10);
  font-size: 0.95rem;
  text-decoration: none;
  transition: color 0.2s;
}

.forgot-link {
  text-align: right;
  margin-top: 8px;
}

.forgot-link:hover, .signup-link a:hover {
  color:rgb(194, 12, 218);
  text-decoration: underline;
}

.signup-link {
  text-align: center;
  margin-top: 18px;
  font-size: 1rem;
}

.signup-link a {
  color:rgb(28, 200, 223);
  font-weight: 600;
  text-decoration: none;
}

/* Responsif agar nyaman di mobile */
@media (max-width: 480px) {
  .login-card {
    padding: 30px 20px;
    max-width: 320px;
  }
  .login-card h1 {
    font-size: 1.8rem;
  }
  .btn-login {
    font-size: 1rem;
  }
}

  </style>
</head>
<body>
  <div class="login-card">
    <h1>Login</h1>
    <form method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="username" placeholder="Masukkan email" required>
      </div>
      <div class="mb-2">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
      </div>
      <a href="#" class="forgot-link">Lupa Sandi?</a>
      <button type="submit" class="btn btn-login" name="login" id="login">Login</button>
      <div class="signup-link">
        Belum punya akun? <a href="user/daftar.php">Daftar</a>
      </div>
    </form>
  </div>
</body>
</html>


</body>

</html>