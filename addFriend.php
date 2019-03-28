<?php include('server.php'); ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>

  <style media="screen">
    .add, .unrequest, .unfriend{
      display: none;
    }
  </style>
  <body>
    <?php
    $userID = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id='$userID'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    while ($row = mysqli_fetch_array($result)) {
      if ($resultCheck > 0) {
        echo $row['username'];
        echo " ";
        echo $row['id'];
        echo '<br>';
        echo "<img src='images/".$row['images']."'>";
        echo '<button type="submit" class="add" name="add">Add</button>';
        echo '<button type="submit" class="unrequest" name="add">Unrequest</button>';
        echo '<button type="submit" class="unfriend" name="add">Unfriend</button>';

      }
    }
     ?>
  </body>
  <script>
    $(document).ready(function(){
      $('.add').show();
      $('.add').click(function(){

        $.post("friendRequest.php",
          {
            myID: <?php echo $_SESSION['id']; ?>,
            toID : <?php echo $_GET['id']; ?>

          },
           function(data){
             alert(data);
               });

             });

      });

  </script>
</html>
