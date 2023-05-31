<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // User is not logged in, redirect to the login page or desired page
    header("Location: index.php");
    exit();
}

// Handle the logout action
if (isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();

    // Redirect to the login page or desired page after logout
    header("Location: index.php");
    exit();
}
?>