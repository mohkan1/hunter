<?php

include_once 'testphp.php';
error_reporting(E_ALL);


  $first = $_POST['first'];
  $last = $_POST['last'];

  $number = $_POST['number'];
  $city = $_POST['city'];

  $gmail = $_POST['gmail'];
  $password = $_POST['password'];

  $sql = "INSERT INTO input2(first, last, phoneNumber, city, gmail, password)
  VALUES ('$first','$last','$number','$city','$gmail','$password')";
  mysqli_query($conn, $sql);

  header ("Location: ../input.html");




 ?>
