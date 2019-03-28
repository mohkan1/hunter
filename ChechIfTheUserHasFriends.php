<?php
include_once 'testphp.php';

  if(!empty($_POST['check'])){
    $check = $_POST['check'];

    $sql = "SELECT * FROM `relations` WHERE `friend_fk`='$check' AND status='accepted'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        echo "yes";
    }else{
      echo "no";
    }
  }
