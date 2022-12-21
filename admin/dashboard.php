<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../public/img/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../public/img/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../public/img/favicon/favicon-16x16.png" />
    <link rel="manifest" href="../public/img/favicon/site.webmanifest" />
    <!-- Style -->
    <link rel="stylesheet" href="../public/css/style2.css" />
    <script src="https://kit.fontawesome.com/67af74f10d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Admin Dashboard - Seleksi Penerimaan CPNS KKP 2022</title>
  </head>
  <?php
      error_reporting(0);
      session_start();
      if (!isset($_SESSION['admin_email'])){
          header("Location: ./login.php");
      }
      $email = $_SESSION['admin_email'];

      include "../backend/functions.php";
      $calon_pegawai = read('SELECT * FROM users WHERE status IS NULL AND biodata_submitted_at <> "" AND document_submitted_at <> ""');
      $admin_name = read("SELECT name FROM admin WHERE email = '$email'")[0];
  ?>
  <body>
    <?php include './component/header.php'?>
    <div class="container">
      <?php include './component/navbar.php'?>
      <section>
        <h1 style="margin-bottom: 16px;">Selamat Datang, <?= $admin_name['name'] ?></h1>
        <p style="margin-bottom: 32px;">Daftar Peserta CPNS KKP 2022</p>
      <main>
      <div>
        <table>
          <thead>
            <th>NIK</th>
            <th>Nama</th>
            <th>Dokumen</th>
            <th>Verifikasi</th>
          </thead>
          <tbody>
            <?php foreach ($calon_pegawai as $row) : ?>
            <tr>
              <td><?= $row['nik'] ?></td>
              <td><?= $row['name'] ?></td>
              <td>
                <div class="block">
                  <a href="../storage/ijazah<?= $row['ijazah'] ?>"><img src="../public/img/file.svg" alt=""></a>
                  <a href="../storage/cv/<?= $row['cv'] ?>"><img src="../public/img/award.svg" alt=""></a>
                </div>
              </td>
              <td>
                <div class="block">
                  <a href="../backend/verification.php?email=<?= $row['email'] ?>&status=passed&verified_by=<?= $email ?>"><img src="../public/img/check.svg" alt=""></a>
                  <a href="../backend/verification.php?email=<?= $row['email'] ?>&status=failed&verified_by=<?= $email ?>"><img src="../public/img/x.svg" alt=""></a>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </main>
      </div>
      </section>
    </div>
    <!-- Javascript -->
    <script src="./js/navbar-toggle.js"></script>
  </body>
</html>
