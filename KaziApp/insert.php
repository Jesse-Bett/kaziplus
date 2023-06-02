<?php
// This file handles form input from home.php and inserts it into the database.

session_start();
include('config.php');

// Retrieve form data
$projectName = $_POST['projectName']; // will be used to get the pid.
$unsafeTask = $_POST['task'];
$task = htmlentities($unsafeTask); // sanitizing the input to prevent code injection.
$unsafeComments = $_POST['comments'];
$comments = htmlentities($unsafeComments); 
$dateDone = $_POST['dateDone'];

// Variables to be used later
$timeTaken;
$eid = $_SESSION['eid']; // employee id


// Calculating time taken
$sql = "SELECT start_date, end_date, pid FROM Projects where project_name = '$projectName' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

//start date and end date from the database
$startDate = $row['start_date'];
$endDate = $row['end_date'];
$pid = $row['pid'];

// Creating DateTime objects from the dates and times
$datetime1 = new DateTime($startDate);
$datetime2 = new DateTime($endDate);


// Calculating the difference in hours and assigning it to $timeTaken
$interval = $datetime1->diff($datetime2);
$timeTaken = ($interval->days * 24) + $interval->h;


// Preparing an insert statement.
$sql = "INSERT INTO Task (eid, pid, date_done, task, time_taken, comments) VALUES ('$eid', '$pid','$dateDone', '$task','$timeTaken', '$comments')";

// Executing the statement.
if ($conn->query($sql) === TRUE) {
    // data inserted successfully, redirect to the home page.
      header("Location: home.php");  
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();