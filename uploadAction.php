<?php
  if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    print($files);
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];


    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt , $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 1000000) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = 'uploads/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          header("Location: localhost/upload2.php");

        }else{
          echo "File is too big";
        }


      }else{
        echo "There was an error";
      }



    }else{
      echo "can't uppload this file";
    }
  }
