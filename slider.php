<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <style media="screen">
      #wrapper{
        margin: auto;
        display: flex;
        width: 400px;
        overflow: hidden;



      }

      *{
        margin: 0;
      }

      main{
        overflow: hidden;
        height: 315px;
      }
      button{
        margin-left: auto;
        margin-right: auto;
        display: block;
        display: none;
      }
      p{
        width: auto;
        text-align: center;
      }
      h1{
        width: auto;
        text-align: center;
        color: red;
      }

    </style>
    <h1>Fade Slider</h1>
    <div id="wrapper">

      <main>


        <img id="first" src="https://www.istockphoto.com/resources/images/HomePage/Tiles/IsolatedImages_696025506.jpg" alt="">
        <img id="second" src="https://images.unsplash.com/photo-1482921921831-ae198abd8fc4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="">
        <img id="third" src="https://images.unsplash.com/photo-1475706997440-9f2a24435b83?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="">
        <img id="forth" src="https://images.unsplash.com/photo-1496379896897-7b57622f431b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="">

      </main>

    </div>
    <button id="left" type="button" name="button">Left</button>
    <button id="right" type="button" name="button">Right</button>
    <br>
    <p></p>
    <script>

    $("button").show();
     number = 1;
     $("p").text(number + " av 4");

    $(document).ready(function(){
      $("#left").click(function(){


          switch (number) {
            case 1:
            number = 4;
            $("#first").hide(1000);
            $("#second").hide(1000);
            $("#third").hide(1000);

            console.log("bild nummer " + number);
            $("p").text(number + " av 4");

              break;

            case 4:
            number--;
            $("#third").show(1000);
            console.log("bild nummer " + number);
            $("p").text(number + " av 4");

              break;


            case 3:
            number--;
            $("#second").show(1000);
            console.log("bild nummer " + number);
            $("p").text(number + " av 4");

              break;

            case 2:
            number--;
            $("#first").show(1000);
            console.log("bild nummer " + number);
            $("p").text(number + " av 4");

              break;

            default:

          }



      });

      $("#right").click(function(){



                switch (number) {
                  case 1:
                  $("#first").hide(1000);
                  number++;
                  console.log("bild nummer " + number);
                  $("p").text(number + " av 4");


                    break;

                  case 2:
                  $("#second").hide(1000);
                  number++;
                  console.log("bild nummer " + number);
                  $("p").text(number + " av 4");

                    break;

                  case 3:
                  $("#third").hide(1000);
                  number++;
                  console.log("bild nummer " + number);
                  $("p").text(number + " av 4");

                    break;

                  case 4:
                  number = 1;
                  $("#forth").hide(1000);
                  $("#first").show(1000);
                  $("#second").show(1000);
                  $("#third").show(1000);
                  $("#forth").show(1000);
                  console.log("bild nummer " + number);
                  $("p").text(number + " av 4");

                    break;


                    console.log(number);
                  default:

                }


      });

      console.log("bild nummer " + number);

    });


    </script>
  </body>
</html>
