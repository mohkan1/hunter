 <?php
  include_once 'testphp.php';
  $sql = "INSERT INTO doortest (command, action)
  VALUES (
    '".$_GET["command"]."',
    '".$_GET["action"]."'
  )";

  if (mysqli_query($conn, $sql)) {
    echo "done";
    exit();
  }else{
    echo "error";
  }


 ?>
