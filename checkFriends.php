<?php
include_once 'testphp.php';

  if(!empty($_POST['myID'])){
    $myID = $_POST['myID'];

    $sql = "SELECT * FROM `relations` WHERE `id_fk2`='$myID' AND status='request'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $list = array();
    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         array_push($list, $row['id_fk1']);
      }
      echo json_encode($list);
    }
  }
