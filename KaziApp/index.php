<?php    
$servername = "localhost";
$username = "root";
$password = "kaziplus254";
$database = "kazi_app";

// Create a new MySQLi instance
$mysqli = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Connected successfully
echo "Connected to the database.";



session_start();

// logging in and session start.
// Function to authenticate the user
function authenticateUser($email, $password) {
    // TODO: Implement your authentication logic here (e.g., querying a database)

    // For demonstration purposes, let's assume the email and password are valid
    $validEmail = 'kaziplus@gmail.com';
    $validPassword = 'password123';

    if ($email === $validEmail && $password === $validPassword) {
        
        // Authentication successful
        return true;
        
    } else {
        // Authentication failed
        return false;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Authenticate the user
    if (authenticateUser($email, $password)) {
        // Store the email in the session
        echo "authentication successful";
        $_SESSION['email'] = $email;
        // Redirect to the home page
        header("Location: home.php");
        exit();
    } else {
        $errorMessage = 'Invalid email or password';
    }
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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">       
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder = "****"  required><br><br>

        <button type="submit" value="Login">Login</button>
      </form>  

</body>
</html>