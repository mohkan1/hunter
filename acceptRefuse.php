<?php
include_once 'testphp.php';

  if(!empty($_POST['myID']) && !empty($_POST['withID']) && !empty($_POST['status'])){
    $myID = $_POST['myID'];
    $withID = $_POST['withID'];
    $status = $_POST['status'];

    switch ($status) {
      case 'accept':
      $sqlA = "INSERT INTO `relations`(`id_fk1`, `id_fk2`, `status`) VALUES ('$myID','$withID','accept')";
      $resultA = mysqli_query($conn, $sql);

      $sqlU = "UPDATE `relations` SET `status`='accept' WHERE id_fk1='$withID' AND id_fk2='$myID'";
      $resultU = mysqli_query($conn, $sql);

      if ($resultA && $resultU) {
        echo "accepted";
      }


        break;

      case 'refuse':
        // code...
        break;

      default:
        // code...
        break;
    }


  }
