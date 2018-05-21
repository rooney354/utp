<?php

require_once "core/init.php";

if( !isset($_SESSION['user']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}

require_once "view/header.php";
?>

<h1>Halaman Profil <?php echo $_SESSION['user']; ?> </h1>

<br>
<div class="kolom_2">
        <form action="">
          <input type="text" name="nama" placeholder="Nama">
          <input type="email" name="email" placeholder="Email">
          <textarea name="pesan" placeholder="pesan" rows="8" cols="40"></textarea>
          <input type="submit" name="submit" value="Kirim">
        </form>
</div>
<?php if( cek_status($_SESSION['user']) ) {?>
  <div>Halo admin</div>
<?php } ?>
<br> <br> <br><br> <br> <br><br> <br> <br><br> <br> <br>
<?php require_once "view/footer.php"; ?>
