<?php

//mendaftarkan user
function register_user($name, $password){
  global $link;

  //mencegah sql injection
  $name = escape($name);
  $password = escape($password);

  $password  = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO users (name, password) VALUES ('$name', '$password')";

  if( mysqli_query($link, $query) ) return true;
  else return false;
}

function cek_nama($name){
    global $link;
    $name = escape($name);

    $query = "SELECT * FROM users WHERE name = '$name'";

    if( $result = mysqli_query($link, $query) ) return mysqli_num_rows($result);
}

//test
function cek_password($password){
    global $link;
    $password = escape($password);

    $query = "SELECT * FROM users WHERE password = 'password'";
    $result = mysqli_query($link, $query);
    $hash   = mysqli_fetch_assoc($result)['password'];

    if( $result = mysqli_query($link, $query) ) return mysqli_num_rows($result);
}

//untuk login
function cek_data($name, $password){
  global $link;

    //mencegah sql injection
    $name = escape($name);
    $password = escape($password);

    $query  = "SELECT password FROM users WHERE name = '$name'";
    $result = mysqli_query($link, $query);
    $hash   = mysqli_fetch_assoc($result)['password'];

  if( password_verify($password, $hash) ) return true;
  else return false;

}

//untuk ubah password
function cek_lagi($password, $newpassword){
  global $link;

    //mencegah sql injection
    $password = escape($password);
    $newpassword = escape($newpassword);

    $query  = "update users set password='$newpassword' where password='password'";
    $result = mysqli_query($link, $query);
    $hash   = mysqli_fetch_assoc($result)['password'];

}

//mencegah injection
function escape($data){
  global $link;
  return mysqli_real_escape_string($link, $data);
}

function redirect_login($name){
    $_SESSION['user'] = $name;
    header('Location: index.php');
}

function flash_delete($name){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

//menguji status user apakah admin atau bukan
function cek_status($name){
  global $link;
  $name = escape($name);

  $query = "SELECT role FROM users WHERE name='$name'";

  $result = mysqli_query($link, $query);
  $status = mysqli_fetch_assoc($result)['role'];

  if( $status == 1) return true;
  else return false;
}

?>
