<?php
require_once "core/init.php";

$error = '';

//validasi register
if( isset($_POST['submit']) ){
  $password = $_POST['password'];
  $newpassword = $_POST['newpassword'];

  if(!empty(trim($password)) && !empty(trim($newpassword)) ){

    if(cek_password($password) == 0 ){
      if( cek_lagi($password, $newpassword)) redirect_login($newpassword);
    } else $error = 'password salah';
  }else $error = 'tidak boleh kosong';
}


require_once "view/header.php";


//meguji pesan session
if(isset($_SESSION['msg'])){
  flash_delete($_SESSION['msg']);
}

?>


<form action="change-password.php" method="post">
  <label for="">Old Password</label> <br>
  <input type="password" name="password"> <br><br>

  <label for="">New Password</label> <br>
  <input type="password" name="newpassword">  <br><br>

  <input type="submit" name="submit" value="Reset">

  <br>

  <?php if($error != ''){ ?>
    <div id="error">
      <?= $error; ?>
    </div>
  <?php } ?>

</form>


<?php require_once "view/footer.php"; ?>
