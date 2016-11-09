<?php
//step 1 connect
require_once 'dbConnClose.php';
$db= connectToDb();

//step 2 run sql statment
$Actor_Id=$_POST['ActorIdUpdate'];
$firstname= mysqli_query($db,"SELECT first_name FROM actor WHERE actor_id='$Actor_Id'");
$lastname= mysqli_query($db,"SELECT last_name FROM actor WHERE actor_id='$Actor_Id'");

$result = mysqli_query($db,"SELECT * FROM actor WHERE actor_id='$Actor_Id'");
if(!$result)
{
    die('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));
}

else{
    echo "<form method='post' action='finalUpdateRecords.php' name='edit'>

<label>ID</label>
        <input name='Actor_id' id='actor_id' type='textbox' value=' $Actor_Id'>
     <label>First name</label>
        <input name='firstName' id='firstName' type='textbox' value=' value of firstname'>
        <br/>
        
         <label>Last Name</label>
        <input name='lastName' id='lastName' type='textbox' value='value of last name'>
        <input class='save' name='update' value='update' type='submit'>
        
        
   
</form>";

}








CloseDb();




?>
<br>
<a href="insertRecords.php">Go Back</a>
