<?php    
// This file handles the login action, it the first page the user sees.

include 'config.php'; // file with database connection.
session_start();

    //  Implementing authentication logic 
    $validEmail = mysqli_real_escape_string($conn,$_POST['email']);
    $validPassword = mysqli_real_escape_string($conn,$_POST['password']);

   $sql = "SELECT eid,first_name FROM Employee WHERE email = '$validEmail' AND password = MD5('$validPassword') "; // eid and first_name will be stored in session.
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $active = $row['active'];

    $firstName = $row['first_name'];
    $eid = $row['eid'];

    
   $count = mysqli_num_rows($result);
      
   // If result matched email and password, table row must be 1 row
   
    if ($count == 1) {
        // Store the email in the session
        echo "authentication successful";
        $_SESSION['eid'] = $eid;// will be used for reference in the database as foreign key, in insert.php.
        $_SESSION['first_name'] = $firstName;
        $loggedIn = true;
        $_SESSION['loggedIn'] = $loggedIn;  // will be used to check if the user is logged in or not.
        
        // Redirect to the home page
        header("Location: home.php");
        exit();
    }
    else if ($count != 1 && $_SERVER['REQUEST_METHOD'] === 'POST') {
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

  label{
    display: inline-block;
    float: left;
    clear: left;
    text-align: right;
    width: 100px;
  }
 input {
  display: inline-block;
  float: left;
  border: 2px solid #2A2F34;
  height: 20px;
}

  button{
    background-color: #2A2F34;
    color: #ffffff;
    height: 30px;
    width:60px; 
    cursor: pointer;
    margin-top: 3px;
    margin-left:100px;
  }

  button:hover{
    opacity: 0.8;
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
        <input type="email" id="email" name="email" placeholder = "johndoe@gmail.com" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder = "*******"  required><br><br>

        <button type="submit" value="Login">Login</button>
      </form>  
      

</body>
</html>
