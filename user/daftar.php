<?php
require "../functions.php";


if (isset($_POST["daftar"])) {
  if (daftar($_POST) > 0) {
    echo "<div class='alert alert-success'>Berhasil mendaftar, silakan login.</div>
            <meta http-equiv='refresh' content='2; url= ../login.php'/>  ";
  }
}


?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>
  <link rel="stylesheet" href="../style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/feather-icons"></script>
 
</head>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <title>Registrasi Sport Hall Karpan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(135deg,rgb(30, 111, 114) 0%,rgb(42, 152, 152) 100%);
      min-height: 100vh;
      font-family: 'Montserrat', Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    form.bg-light {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(163, 4, 255, 0.94);
      padding: 30px 40px;
      max-width: 700px;
      width: 100%;
    }
    h1.regis {
      font-size: 2.2rem;
      font-weight: 700;
      color:rgb(20, 201, 214);
      margin-bottom: 24px;
      text-align: center;
      letter-spacing: 1px;
    }
    label.form-label {
      color:rgb(23, 183, 204);
      font-weight: 600;
    }
    input.form-control {
      border-radius: 10px;
      padding: 10px 12px;
      font-size: 1rem;
      border: 1.5px solidrgb(238, 9, 200);
      transition: border-color 0.3s;
    }
    input.form-control:focus {
      border-color:rgb(227, 11, 235);
      box-shadow: 0 0 8px rgba(123, 7, 233, 0.5);
      outline: none;
    }
    .form-check-label {
      color:rgb(148, 14, 226);
      font-weight: 600;
      user-select: none;
    }
    .button.btn-inti {
      background: linear-gradient(90deg,rgb(0, 247, 255) 0%,rgb(192, 7, 238) 100%);
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 12px 0;
      width: 100%;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
    }
    .button.btn-inti:hover {
      background: linear-gradient(90deg,rgb(8, 231, 231) 0%,rgb(5, 252, 239) 100%);
      color: #fff;
    }
    .text-center p {
      color:rgb(238, 14, 14);
      font-weight: 500;
      margin-top: 12px;
    }
    .text-center p a {
      color:rgb(173, 19, 204);
      font-weight: 700;
      text-decoration: none;
      transition: color 0.3s;
    }
    .text-center p a:hover {
      color:rgb(2, 202, 252);
      text-decoration: underline;
    }
    /* Responsive tweaks */
    @media (max-width: 576px) {
      form.bg-light {
        padding: 20px 25px;
      }
    }
  </style>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data" class="bg-light">
    <h1 class="regis">Registrasi</h1>
    <div class="row">
      <div class="col-lg-6 col-6 mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" id="nama" required />
      </div>
      <div class="col-lg-6 col-6 mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" required />
      </div>
      <div class="col-lg-6 col-6 mb-3">
        <label for="hp" class="form-label">No Hp</label>
        <input type="text" name="hp" class="form-control" id="hp" required />
      </div>
      <div class="col-lg-6 col-6 mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required />
      </div>
      <div class="col-12 mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" name="alamat" class="form-control" id="alamat" required />
      </div>
      <div class="col-12 mb-3 d-flex align-items-center gap-4">
        <label class="form-label mb-0">Jenis Kelamin :</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="male" value="Laki-Laki" required />
          <label class="form-check-label" for="male">Laki-Laki</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="female" value="Perempuan" required />
          <label class="form-check-label" for="female">Perempuan</label>
        </div>
      </div>
      <div class="col-12 mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control" id="foto" required />
      </div>
      <div class="col-12 text-center">
        <button class="button btn-inti" name="daftar" id="daftar" type="submit">Daftar</button>
        <p>Sudah punya akun? <a href="../login.php">Login</a></p>
      </div>
    </div>
  </form>
</body>
</html>

</html>