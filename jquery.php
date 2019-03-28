<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <script>
    window.setInterval(function(){
      $.post("getdemo.php",
      {
        command: "doorRightNow",

      },
      function(doorStatus){
        $("#asd").text(doorStatus);
      });
    }, 2000);

    </script>
    <p id="asd">asd</p>

  </body>
</html>
