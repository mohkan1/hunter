<?php
include_once 'testphp.php';

  if(!empty($_POST['id']) && !empty($_POST['postID']) && !empty($_POST['status'])){
    $id = $_POST['id'];
    $postID = $_POST['postID'];
    $status = $_POST['status'];

    if ($status == "like") {

          $sql = "SELECT * FROM `posts` WHERE `id_fk`='$id' AND `id_pk`='$postID'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck > 0) {
            while ($row = mysqli_fetch_array($result)) {
              //echo "like".$row['id_fk']."&".$row['id_pk'];
              echo "like".$id."OCH".$postID."LIKES".$row['likes'];
            }
          }
    }else if ($status == "dislike"){
          $sql = "SELECT * FROM `posts` WHERE `id_fk`='$id' AND DateAndTime='$postDate'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck > 0) {
            while ($row = mysqli_fetch_array($result)) {
              echo $row['dislikes'];
            }
          }
    }
  }
