<?php
   session_start();
?>



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

You are logged in as kaziplus,


<form action="logout.php" method="POST">
    <button type="submit" name="logout">Logout</button>
</form>


      
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
      <ul>
        <li></li>
      </ul>