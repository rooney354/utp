<?php
require_once "core/init.php";

$error = '';

//redirect kalau user sudah login
if( isset($_SESSION['user']) ) header('Location: index.php');

//validasi register
if( isset($_POST['submit']) ){
  $name = $_POST['name'];
  $password = $_POST['password'];

  if(!empty(trim($name)) && !empty(trim($password)) ){

    if( cek_nama($name) == 0 ){
      //memasukkan ke database
      if(register_user($name, $password)) redirect_login($name);
      else $error =  'gagal daftar';

    }else $error =  ' nama sudah ada, tidak bisa daftar ';

  }else $error =  'tidak boleh kosong';
}


require_once "view/header.php";
?>


<form action="register.php" method="post">
  <label for="">Nama</label> <br>
  <input type="text" name="name"> <br><br>

  <label for="">Password</label> <br>
  <input type="password" name="password">  <br><br>

  <input type="submit" name="submit" value="daftar">
  <br>
  <?php if($error != ''){ ?>
    <div id="error">
      <?= $error; ?>
    </div>
  <?php } ?>

</form>


<?php require_once "view/footer.php"; ?>
