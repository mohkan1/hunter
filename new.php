<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charsset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style media="screen">
      form > div {
        display: flex;
        margin: auto;
      }


    </style>


  </head>
  <body>


    <form>
      <div>
        <p>First Name: </p>
        <input type="text" id="first" name="first">
        <p id="firstAnswer"></p>
      </div>

      <div>
        <p>Last Name: </p>
        <input type="text" id="last" name="last">
        <p id="lastAnswer"></p>
      </div>

      <div>
        <p>Phone number: </p>
        <input type="text" id="number"  name="number">
        <p id="numberAnswer"></p>
      </div>

      <div>
        <p>Gmail: </p>
        <input type="text" id="gmail" name="gmail">
        <p id="gmailAnswer"></p>
      </div>

    </form>
    <button id="action">Apply</button>

    <script>

    $(document).ready(function() {
      mistake = 0;
      function testInfo(input,re,textsvar){


    		var OK = re.exec(input);

    		if (!OK){
          $(textsvar).text("fel");
          mistake = mistake + 1;
          console.log(mistake);
        }
    		else{
    		$(textsvar).text("ok");
        mistake = 0;
        console.log(mistake);
      }
    		}




        		$("#number").keyup(function(){

        			var re = /^[0]{1}[0-9]{6,15}$/;
        			testInfo($('#number').val(),re,"#numberAnswer");
        		});


        		$("#first").keyup(function(){

        			var re = /^[A-Za-z]+$/;
        			testInfo($('#first').val(),re,"#firstAnswer");
        		});

            $("#last").keyup(function(){

              var re = /^[A-Za-z]+$/;
              testInfo($('#last').val(),re,"#lastAnswer");
            });

            $("#gmail").keyup(function(){
              if ($('#gmail').val().length > 0) {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                testInfo($('#gmail').val(),re,"#gmailAnswer");
              }else{
                $('#gmailAnswer').text(" ");
              }
            });


            $('#action').click(function(){
              if ($('#first').val()="" || $('#last').val()="" || $('#number').val()="" || $('#gmail').val()="") {
                alert("Fields are empty!");
              }else{

                              if (mistake > 0) {
                                alert("There is somehting wrong!");
                              }else{
                              alert($('#first').val() + " " + $('#last').val() + ". The phone number is " + $('#number').val() + " and the gmail is " + $('#first').val());
                            }
              }
            });
    });

    </script>
  </body>
</html>
