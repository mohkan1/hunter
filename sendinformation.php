<?php

if (isset($_POST['submit'])) {

  include_once 'testphp.php';
  include_once 'newDataBase.php';


  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $target = "images/".basename($_FILES['image']['name']); //targetting the location of the pic

  $image = $_FILES['image']['name']; //getting the pic


  //Error handlers
  //Check for empty fields
  if (empty($email) || empty($username) || empty($password) || empty($image)) {
    $message = "Empty fields";
    echo "<script type='text/javascript'>alert('$message');</script>";
    exit();
  } else{
    //check if input characters are valid
    if (!preg_match("/^[a-zA-Z]*/", $email) || !preg_match("/^[a-zA-Z]*/", $username) || !preg_match("/^[a-zA-Z]*/", $password)) {
      $message = "Invalid fields";
      echo "<script type='text/javascript'>alert('$message');</script>";
      exit();
    }else {
      // check if email is valid
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid Email";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit();

      }else {
        $sql = "SELECT * FROM `users` WHERE username='$username' OR  gmail='$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
          $message = "Invalid username";
          echo "<script type='text/javascript'>alert('$message');</script>";

          exit();
        }else{

              $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
              //insert the user into the database
              date_default_timezone_set("Europe/Stockholm");
              $date = date("Y-m-d h:i:sa");

              $sqlInsert = "INSERT INTO `users`(`username`, `gmail`, `password`, `images`, `DateAndTime`) VALUES ('$username','$email','$hashedpassword', '$image', '$date')";
              mysqli_query($conn, $sqlInsert);
              if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) { //move the image to the images folder in the database
                echo "Done";
              }else{
                echo "Not done";
              }

              exit();


//


        }


      }


    }


  }



}else{
  $message = "problems";
  echo "<script type='text/javascript'>alert('$message');</script>";
  exit();
}


 ?>
