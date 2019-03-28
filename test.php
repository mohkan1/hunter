<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title></title>
    <style media="screen">


    </style>
    </head>
  <body>

    <form>
      <p id="radio">radio</p>
      <input type="radio" name="radio" value="radio">
      <p>tv</p>
      <input type="radio" name="radio" value="<?php echo "tv"; ?>">

    </form>
    <button type="button" name="button">Click</button>

    <script>
    $(document).ready(function() {


      $("button").click(function(){
        var radio = $("input[name='radio']:checked").val();
        if (radio) {
          $("#radio").css("background-color", "green");
          alert(radio);
        }
      });

    });
    </script>

  </body>
</html>
