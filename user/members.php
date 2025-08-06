<?php
session_start();
require "../functions.php";

$loggedIn = isset($_SESSION['role']);

if ($loggedIn) {

  $id_user = $_SESSION["id_user"];

  // Melakukan query hanya jika $_SESSION["id_user"] sudah terdefinisi
  $profil = query("SELECT * FROM user_212279 WHERE 212279_id_user = '$id_user'")[0];
}

if (isset($_POST["simpan"])) {
  if (edit($_POST) > 0) {
    echo "<script>
          alert('Berhasil Diubah');
          </script>";
  } else {
    echo "<script>
          alert('Gagal Diubah');
          </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Sport Hall Karpan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/cr7.png" rel="icon">
  <link href="assets/img/cr7.png" rel="apple-touch-icon">


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="../assets/img/logo portugal.png" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="../index.php">Beranda<br></a></li>
          <li><a href="lapangan.php">Lapangan</a></li>
          <?php if ($loggedIn) : ?>
            <li>
              <a class="active" href="pesanan.php">Pesanan</a>
            </li>
          <?php endif; ?>
          <!-- <li><a href="membership.php">Membership</a></li> -->
          <li><a href="tournament.php">Tournament</a></li>
          <li><a href="members.php" class="active">Our Team</a></li>
          <li><a href="../kontak.php">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <?php if ($loggedIn) : ?>
        <!-- Jika sudah login, tampilkan tombol profil -->
        <a class="btn-getstarted" data-bs-toggle="modal" data-bs-target="#profilModal">
          <i class="bi bi-person"></i> Profil
        </a>
      <?php else : ?>
        <!-- Jika belum login, tampilkan tombol login -->
        <a href="../login.php" class="btn-getstarted" type="submit">
          <i class="bi bi-box-arrow-in-right"></i> Login
        </a>
      <?php endif; ?>


    </div>
  </header>

  <!-- Modal Profil -->
  <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="profilModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profilModalLabel">Profil Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-4 my-5">
                <img src="../img/<?= $profil["212279_foto"]; ?>" alt="Foto Profil" class="img-fluid ">
              </div>
              <div class="col-8">
                <h5 class="mb-3"><?= $profil["212279_nama_lengkap"]; ?></h5>
                <p><?= $profil["212279_jenis_kelamin"]; ?></p>
                <p><?= $profil["212279_email"]; ?></p>
                <p><?= $profil["212279_no_handphone"]; ?></p>
                <p><?= $profil["212279_alamat"]; ?></p>
                <a href="../logout.php" class="btn btn-danger">Logout</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#editProfilModal" class="btn btn-inti">Edit Profil</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Profil -->

  <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <img src="../img/IS.jpg" alt="">
   
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Website Team 5</h1>
              <p class="mb-0">Mata Kuliah Sistem Layanan Berbasis lokasi</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Page Title -->
   

  <!-- Profle members -->

   <section> 

  <section id="courses" class="courses section">
  <div class="container">
        
    <div class="row gy-4" style="display: flex; flex-wrap: wrap; gap: 24px; justify-content: center;">

      <!-- Anggota 1 -->
       <div class="profile-card" data-aos="zoom-in" data-aos-delay="200" style="flex: 1 1 280px; max-width: 320px;">
        <img src="../img/erwindo.jpg" alt=".." class="profile-photo" />
        <div class="profile-info">
          <h3 class="profile-name">Edwin Nanlohy</h3>
          <p class="profile-role">220101089</p>
          <p class="profile-role">Maintanace Website</p>
          <a href="https://www.instagram.com/ewin_rnldo7/" target="_blank" rel="noopener" class="btn-instagram">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 3a1 1 0 110 2 1 1 0 010-2zm-5 3a4 4 0 110 8 4 4 0 010-8zm0 2a2 2 0 100 4 2 2 0 000-4z"/>
      </svg>
        Instagram
      </a>

        </div>
      </div>

      <!-- Anggota 2 -->
      <div class="profile-card" data-aos="zoom-in" data-aos-delay="200" style="flex: 1 1 280px; max-width: 320px;">
        <img src="../img/Devi.jpg" alt=".." class="profile-photo" />
        <div class="profile-info">
          <h3 class="profile-name">Devi Triani Nur Azahra</h3>
          <p class="profile-role">220101032</p>
          <p class="profile-role">Implementasi User 1</p>
          <a href="https://instagram.com/username" target="_blank" rel="noopener" class="btn-instagram">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 3a1 1 0 110 2 1 1 0 010-2zm-5 3a4 4 0 110 8 4 4 0 010-8zm0 2a2 2 0 100 4 2 2 0 000-4z"/>
      </svg>
        Instagram
      </a>

        </div>
      </div>

      <!-- Anggota 3 -->
        <div class="profile-card" data-aos="zoom-in" data-aos-delay="200" style="flex: 1 1 280px; max-width: 320px;">
        <img src="../img/Agus.jpg" alt="Siti Nurhaliza" class="profile-photo" />
        <div class="profile-info">
          <h3 class="profile-name">Agus Remsy lewar</h3>
          <p class="profile-role">220101052</p>
          <p class="profile-role">Implementasi User 2</p>
          <a href="https://www.instagram.com/ajengwakim?igsh=azlma2pnN2ViYWFs" target="_blank" rel="noopener" class="btn-instagram">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 3a1 1 0 110 2 1 1 0 010-2zm-5 3a4 4 0 110 8 4 4 0 010-8zm0 2a2 2 0 100 4 2 2 0 000-4z"/>
      </svg>
        Instagram
      </a>

        </div>
      </div>

      <!-- Anggota 4 -->
        <div class="profile-card" data-aos="zoom-in" data-aos-delay="200" style="flex: 1 1 280px; max-width: 320px;">
        <img src="../img/doan.jpg" alt="Siti Nurhaliza" class="profile-photo" />
        <div class="profile-info">
          <h3 class="profile-name">Doan Nanlohy</h3>
          <p class="profile-role">220101085</p>
          <p class="profile-role">Implementasi User 3</p>
          <a href="https://www.instagram.com/_its.rexy?igsh=ZzIyeTRhcHY5ZWg0" target="_blank" rel="noopener" class="btn-instagram">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 3a1 1 0 110 2 1 1 0 010-2zm-5 3a4 4 0 110 8 4 4 0 010-8zm0 2a2 2 0 100 4 2 2 0 000-4z"/>
      </svg>
        Instagram
      </a>

        </div>
      </div>

      <!-- Anggota 5 -->
        <div class="profile-card" data-aos="zoom-in" data-aos-delay="200" style="flex: 1 1 280px; max-width: 320px;">
        <img src="../img/Ajeng.jpg" alt="Siti Nurhaliza" class="profile-photo" />
        <div class="profile-info">
          <h3 class="profile-name">Ajeng Wakim</h3>
          <p class="profile-role">220101007</p>
          <p class="profile-role">Implementasi User 4</p>
          <a href="https://www.instagram.com/devizahraa_" target="_blank" rel="noopener" class="btn-instagram">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 3a1 1 0 110 2 1 1 0 010-2zm-5 3a4 4 0 110 8 4 4 0 010-8zm0 2a2 2 0 100 4 2 2 0 000-4z"/>
      </svg>
        Instagram
      </a>

        </div>
      </div>

      <!--anggota 6 -->
       <div class="profile-card" data-aos="zoom-in" data-aos-delay="200" style="flex: 1 1 280px; max-width: 320px;">
        <img src="../img/Asry.png" alt="Siti Nurhaliza" class="profile-photo" />
        <div class="profile-info">
          <h3 class="profile-name">Asry</h3>
          <p class="profile-role">220101089</p>
          <p class="profile-role">Admin 1</p>
          <a href="https://instagram.com/username" target="_blank" rel="noopener" class="btn-instagram">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 3a1 1 0 110 2 1 1 0 010-2zm-5 3a4 4 0 110 8 4 4 0 010-8zm0 2a2 2 0 100 4 2 2 0 000-4z"/>
      </svg>
        Instagram
      </a>

        </div>
      </div>

      <!-- anggota 7 -->
        <div class="profile-card" data-aos="zoom-in" data-aos-delay="200" style="flex: 1 1 280px; max-width: 320px;">
        <img src="../img/arvi.jpg" alt="Siti Nurhaliza" class="profile-photo" />
        <div class="profile-info">
          <h3 class="profile-name">Muh Arvi</h3>
          <p class="profile-role">220101042</p>
          <p class="profile-role">Admin 2</p>
          <a href="https://instagram.com/username" target="_blank" rel="noopener" class="btn-instagram">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 3a1 1 0 110 2 1 1 0 010-2zm-5 3a4 4 0 110 8 4 4 0 010-8zm0 2a2 2 0 100 4 2 2 0 000-4z"/>
      </svg>
        Instagram
      </a>

        </div>
      </div>

      

         <!-- anggota 8 -->
        <div class="profile-card" data-aos="zoom-in" data-aos-delay="200" style="flex: 1 1 280px; max-width: 320px;">
        <img src="../img/wahyu.jpg" alt="Siti Nurhaliza" class="profile-photo" />
        <div class="profile-info">
          <h3 class="profile-name">Wahyu Hadat Aldi Tomagola</h3>
          <p class="profile-role">220101006</p>
          <p class="profile-role">Admin 3</p>
          <a href="https://instagram.com/username" target="_blank" rel="noopener" class="btn-instagram">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 3a1 1 0 110 2 1 1 0 010-2zm-5 3a4 4 0 110 8 4 4 0 010-8zm0 2a2 2 0 100 4 2 2 0 000-4z"/>
      </svg>
        Instagram
      </a>

        </div>
      </div>

    </div>
  </div>
</section>
<!-- end of profile -->


<!-- style in ptofile -->

<style>
.profile-card {
  background: rgb(255, 255, 255); /* transparan dengan warna aqua */
  color:rgb(255, 255, 255);
  border-radius: 20px;
  padding: 20px 16px 28px;
  box-shadow: 0 6px 18px rgb(22, 116, 179);
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
  max-width: 280px;
  margin: 0 auto 20px;
  box-sizing: border-box;
  backdrop-filter: blur(8px); /* efek blur untuk latar belakang transparan */
  border: 1px solid rgb(174, 0, 255);
}

.profile-card:hover {
  transform: translateY(-10px) scale(1.05);
  box-shadow: 0 14px 30px rgb(0, 4, 255);
  background: rgb(179, 240, 236);
  border-color: rgba(8, 226, 255, 0.3);
}

.profile-photo {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid aquamarine;
  box-shadow: 0 4px 12px rgba(230, 235, 235, 0.87);
  margin-bottom: 16px;
  transition: transform 0.3s ease;
}

.profile-card:hover .profile-photo {
  transform: scale(1.08);
}

.profile-info {
  text-align: center;
  width: 100%;
  padding: 0 12px;
}

.profile-name {
  font-size: 1.35rem;
  font-weight: 700;
  margin-bottom: 6px;
  color:rgb(13, 13, 14);
  text-shadow: 0 0 8pxrgba(16, 230, 222, 0.88);
  animation: nameGlow 3s ease-in-out infinite;
}

.profile-role {
  font-style: italic;
  color:rgb(8, 8, 8);
  margin-bottom: 14px;
  font-size: 0.9rem;
  text-shadow: 0 0 4pxrgb(8, 238, 226);
}

.btn-instagram {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background-color:rgb(179, 0, 255);
  color:rgb(0, 0, 0);
  padding: 8px 24px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: 600;
  font-size: 0.95rem;
  box-shadow: 0 4px 12px rgba(255, 2, 255, 0.93);
  transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
  user-select: none;
  cursor: pointer;
  width: fit-content;
  margin: 0 auto;
}

.btn-instagram svg {
  fill:rgb(248, 248, 248);
  width: 18px;
  height: 18px;
  transition: transform 0.3s ease;
}

.btn-instagram:hover {
  background-color:rgb(83, 13, 94);
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.8);
  transform: scale(1.1);
}

.btn-instagram:hover svg {
  transform: rotate(20deg) scale(1.3);
}

@keyframes nameGlow {
  0%, 100% {
    text-shadow: 0 0 8px #00bfa5, 0 0 20px #00bfa5;
    transform: scale(1);
  }
  50% {
    text-shadow: 0 0 20px #00fff7, 0 0 30px #00fff7;
    transform: scale(1.05);
  }
}

/* Responsif untuk berbagai ukuran layar */
@media (max-width: 768px) {
  .profile-card {
    max-width: 220px;
    padding: 18px 14px 26px;
  }
  .profile-photo {
    width: 80px;
    height: 80px;
  }
  .profile-name {
    font-size: 1.1rem;
  }
  .profile-role {
    font-size: 0.85rem;
  }
  .btn-instagram {
    padding: 7px 20px;
    font-size: 0.9rem;
  }
}

</style>




  <!-- end style of profile -->



  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-6 col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">St arraya Fc</span>
          </a>

         <div class="footer-contact pt-3">
            <p>Kelompok 5</p>
            <p>Indonesia</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+62 081324401900</span></p>
            <p><strong>Email:</strong> <span>Kelompok5@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-whatsapp"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
          </div>
        </div>

        <div class=" col-6 col-lg-4 col-md-6 footer-links">
          <h4>Navigasi</h4>
          <div class="row">
            <div class="col-6 col-lg-4">
              <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Lapangan</a></li>
                <li><a href="#">Membership</a></li>
              </ul>
            </div>
            <div class="col-6 col-lg-4">
              <ul>
                <li><a href="#">Tournament</a></li>
                <li><a href="#">Our Team</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>


        <div class="col-6 col-lg-4 col-md-6 footer-links">
          <h4>Syarat & Ketentuan</h4>
          <ul>
            <li><a href="#">Lihat Syarat & Ketentuan</a></li>
          </ul>
        </div>

      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>