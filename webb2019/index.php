<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <fieldset>
      <legend>Form</legend>
        <form action="svar.php" method="GET">
          <label for="user">user</label>
          <input type="text" id="user" name="username">

          <input type="submit" name="submit" value="MONSTER">

          <br>
          
          <label for="gen">male</label>
          <input type="radio" id="gen" name="gender" value="male">
          <label for="gen">female</label>
          <input type="radio" id="gen" name="gender" value="female">
        </form>


    </fieldset>

  </body>
</html>
