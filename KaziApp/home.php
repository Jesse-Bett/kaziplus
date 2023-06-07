<?php

// Purpose: Home page for the user, appears after  successful login

   session_start();
   include('config.php');

   // Check if the user is not logged in
    if (!isset($_SESSION['eid']) || $_SESSION['loggedIn'] !== true) {
    // Redirect the user to the login page or display an error message
    header("Location: index.php");
    exit;
  }
    
   // query to get all project names from Projects table.
   $sql = "SELECT project_name FROM Projects";
   $result = $conn->query($sql);

?>




<style>
  body{
    padding: 4px;
    font-family:monospace;
    font-weight: 500;
    font-size: large;
    margin: 2%;
  }

  h2{
    color: #2A2F34;
  }

  label{
    display: inline-block;
    float: left;
    clear: left;
    text-align: right;
    width: 150px;
  }
 input,select {
  display: inline-block;
  float: left;
  border: 2px solid #2A2F34;
}

#comments{
  width: 400px;
  height: 90px;
  margin-bottom: 12px;
  border: 2px solid #2A2F34;
}

#logout{
  margin-left: 3px;
}

  button{
    background-color: #2A2F34;
    margin: 8px;
    color: #ffffff;
    height: 30px;
    width:60px;
    cursor: pointer;
    border-radius: 3px;
    margin-left: 150px;
    margin-top: 10px;
    display: inline-block;
  }

  button:hover{
    opacity: 0.8;
  }

  li::before{
    content: " ✔ ";
}

  ul{
    list-style-type:none;
    text-align: left;
    display: inline-block;
    float: left;
    clear: left;
    width: 400px;
    margin-left: 90px;
  }

</style>

   Welcome back <?php echo $_SESSION['first_name']; ?>!


<form action="logout.php" method="POST">
    <button type="submit" name="logout" id="logout">Logout</button>
</form>


      <!-- Time Sheet Section  -->
      <h2>Time Sheet</h2> 
      <form action="insert.php" method="post" id="dataform">
          <label for="projectName">Project Name:</label>
         <select type="select" id="projectName" name="projectName" required>
         <option selected="selected" value=""> -- Choose one -- </option>

        <?php
         // run query to get all project names
         $sql = "SELECT project_name FROM Projects";
         $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
         ?>
        <option value= "<?php echo $row["project_name"]?>"> <?php echo $row["project_name"]; ?></option>;

      <?php
          }
         } else {
         echo "0 results";
          }
        ?>

         </select><br><br> 

  
          <label for="task">Task:</label>
          <input type="text" id="task" name="task" required><br><br>

          <label for="comments">Comment:</label> 
          <textarea name="comments" id="comments" placeholder = "Enter comments here..." id="comments" name="comments" required></textarea><br><br>
  
          <label for="dateDone">Date Done:</label>
          <input type="date" id="dateDone" name="dateDone" required><br><br>

          
  
          <button type="submit">Add</button>
      </form>
  
      <h2>Tasks Done</h2><!-- Tasks Done Section -->
      
       <?php 
        // Get the employee id from the session
        $eid = $_SESSION['eid'];

      // Query to get all tasks done by the user
       $tasksQuery = "SELECT task FROM Task WHERE eid = '$eid'";
       $tasksResult = $conn->query($tasksQuery);

       // Create an array to store the tasks
      $tasksArray = array();
       if ($tasksResult->num_rows > 0) {
          while ($row = $tasksResult->fetch_assoc()) {
              $tasksArray[] = $row;
           }
      }
      $tasksArray = array_column($tasksArray, 'task');
    

      // Close the database connection
       $conn->close();

       
      //Output the array values in an unordered list
            echo '<ul>';
       foreach ($tasksArray as $value) {
      echo '<li>' . $value . '</li>';
       }
      echo '</ul>';
       ?>
