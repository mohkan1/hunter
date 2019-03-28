<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style media="screen">
      #mycolor{
        display: none;
      }
    </style>
  </head>
  <body>

    <form>
      <p>Javascript is blocked</p>
      <input type="color" id="mycolor" value="#008080">
    </form>

 <script>



      $(document).ready(function(){

        $("p").text("Pick a color");
        $("#mycolor").show();

        myStorage = window.localStorage;
        body = document.getElementsByTagName('body')[0];

          document.getElementById("mycolor").addEventListener("change", function(){
          var z = document.getElementById("mycolor").value;
          console.log(z);

          myStorage.setItem("färg", z);
          document.body.style.backgroundColor = z;
        });

        var color = myStorage.getItem('färg');
        body.style.backgroundColor=color;

      });




    </script>

  </body>
</html>
