<?php
    define('USER', 'root');
    define('PASSWORD', 'kaziplus254');
    define('HOST', 'localhost');
    define('DATABASE', 'kazi_app');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);  // connecting to our database
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>




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

// ... Perform SQL operations here ...

// Close the connection
$mysqli->close();
?>
