<?php

  include_once 'testphp.php';

    if(!empty($_POST['command']) && !empty($_POST['action'])){
    	$command = $_POST['command'];
    	$action = $_POST['action'];

      $sqlInsert = "INSERT INTO doortest(`command`, `action`) VALUES ('".$command."','".$action."')";
      $result = mysqli_query($conn, $sqlInsert);
      if ($result == true) {
        echo "Data recieved";
      } else {
        echo "Data could not be sent to the database";
      }


	}else{
    echo "Somthing wrong";
  }


	$conn->close();
?>
