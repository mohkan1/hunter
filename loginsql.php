<?php
  session_start();
  session_regenerate_id();
if (isset($_POST['submit'])) {

  include_once 'testphp.php';

  $username = mysqli_real_escape_string($conn, $_POST['usernameL']);
  $password = mysqli_real_escape_string($conn, $_POST['passwordL']);

  if (Empty($username) || empty($password)) {
    header("Location: ../login.php?problem");
    $message = "Empty fields";
    echo "<script>alert('$message');</script>";
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE username = '$username' OR gmail='$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck < 1) {
      $message = "Somthing wrong";
      echo "<script type='text/javascript'>alert('$message');</script>";
      exit();
    } else {
      if ($row = mysqli_fetch_assoc($result)) {
         //DEhashing the password
         $hashed = password_verify($password, $row['password']);
         if ($hashed == false) {
           $message = "problems";
           echo "<script type='text/javascript'>alert('$message');</script>";
           exit();
        } elseif ($hashed == true) {

           //Log in the user here
           $_SESSION['id'] = $row['id'];
           $_SESSION['username'] = $row['username'];
           $_SESSION['password'] = $row['password'];
           $_SESSION['email'] = $row['email'];

/*
           $loggedin = "loggedin";
           $username = $row['username'];
           $email = $row['email'];
           date_default_timezone_set("Europe/Stockholm");
           $date = date("Y-m-d h:i:sa");

           $sql = "INSERT INTO loginData4(status, username, email, DateAndTime) VALUES ('".$loggedin."','".$username."','".$email."','".$date."')";
           if (mysqli_query($conn, $sql)) {
             $message = "done";
             echo "<script type='text/javascript'>alert('$message');</script>";
           }else{
             $message = "Problem";
             echo "<script type='text/javascript'>alert('$message');</script>";
           }
*/
           Header("Location: ../?loggedin");
           exit();



         }

      }

    }

  }



} else{
//  header("Location: ../login.php");
}

 ?>
