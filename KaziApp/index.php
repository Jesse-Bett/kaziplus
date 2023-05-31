<?php    

include 'config.php'; // file with database connection.
session_start();
// logging in and session start.

    //  Implementing authentication logic 
    $validEmail = mysqli_real_escape_string($conn,$_POST['email']);
    $validPassword = mysqli_real_escape_string($conn,$_POST['password']);

   $sql = "SELECT * FROM Employee WHERE email = '$validEmail' AND password = MD5('$validPassword') ";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $active = $row['active'];

   $count = mysqli_num_rows($result);
      
   // If result matched $myusername and $mypassword, table row must be 1 row
   
    if ($count == 1) {
        // Store the email in the session
        echo "authentication successful";
        $_SESSION['email'] = $email;
        // Redirect to the home page
        header("Location: home.php");
        exit();
    } else {
        $errorMessage = 'Invalid email or password';
    }




// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

}  
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kazi App</title>
    <style>
  body{
    padding: 4px;
    font-family:monospace;
    font-weight: 500;
    font-size: large;
    margin: 2%;
  }

  button{
    background-color: #339CFF;
    margin: 8px;
    color: #ffffff;
    height: 30px;
    width:60px; 
  }

  button:hover{
    background-color: #2A2F34;
  }

</style>
</head>
<body>
  

    <h2>Log In</h2> <!-- Log In section  -->
    <?php if (isset($errorMessage)) { ?>
        <p><?php echo $errorMessage; ?></p>
    <?php } ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">       
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder = "****"  required><br><br>

        <button type="submit" value="Login">Login</button>
      </form>  

</body>
</html>