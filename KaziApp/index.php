<?php
   ob_start();
   session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kazi App</title>
</head>
<body>


  

    <h2>Login</h2> <!-- Log In section  -->
    <form action="php_scripts/login.php" method = "post">       
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="pwd">Password:</label>
        <input type="password" id="pwd" name="pwd" placeholder = "****"><br><br>

        <button type="submit">Login</button>
      </form>  

      Click here to Log Out <a href = "logout.php" tite = "Logout">Session.
      
    <h2>Time Sheet</h2> <!-- Time Sheet Section  -->
    <form action="/action_page.php">
        <label for="projectName">Project Name:</label>
        <input type="text" id="projectName" name="projectName"><br><br>

        <label for="task">Task:</label>
        <input type="text" id="task" name="task"><br><br>

        <label for="comment">Comment:</label>
        <input type="text" id="comment" name="comment"><br><br>

        <label for="dateDone">Date Done:</label>
        <input type="date" id="dateDone" name="dateDone"><br><br>

        <button type="submit">Add</button>
    </form>

    <h2>Tasks Done</h2><!-- Tasks Done Section -->

</body>
</html>