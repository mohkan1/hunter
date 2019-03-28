<?php

if (isset($_POST['submit'])) {
  session_start();
  include_once 'testphp.php';
/*
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];

  $loggedout = "loggedout";
  date_default_timezone_set("Europe/Stockholm");
  $date = date("Y-m-d h:i:sa");

  $sql = "INSERT INTO loginData4(status, username, email, DateAndTime) VALUES ('".$loggedout."','".$username."','".$email."','".$date."')";
  if (mysqli_query($conn, $sql)) {
    $message = "done";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }else{
    $message = "Problem";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
*/

  session_unset();
  session_destroy();
  session_regenerate_id();
  header("Location: ../");
  exit();
}

 ?>
