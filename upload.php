
<?php
include_once 'testphp.php';

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="size" value="1000000">
      <input type="file" name="image">
      <textarea name="text" rows="8" cols="80">Say somthing</textarea>
      <input type="submit" name="upload" value="upload image">
    </form>

    <?php

    if (isset($_POST['upload'])) {
      $target = "images/".basename($_FILES['image']['name']);

      $image = $_FILES['image']['name'];
      $text = $_POST['text'];

      $sql = "INSERT INTO images (image, text) VALUES ('$image','$text')";
      mysqli_query($conn, $sql);

      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "done";
      }else{
        echo "not done";
      }

}
     ?>

     <?php
     $result = mysqli_query($conn, "SELECT * FROM images");
     $resultCheck = mysqli_num_rows($result);

     while ($row = mysqli_fetch_array($result)) {
       echo "<div id='img_div'>";
       echo "<img src='images/".$row['image']."'>";
       echo "<p>".$row['text']."</p>";
       echo "</div>";
         }
       ?>

  </body>
</html>
