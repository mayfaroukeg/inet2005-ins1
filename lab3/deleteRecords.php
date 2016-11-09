<?php
//step 1 connect
require_once 'dbConnClose.php';
$db= connectToDb();

//step 2 run sql statment
$Actor_Id=$_POST['ActorId'];



$result = mysqli_query($db,"DELETE FROM actor WHERE actor_id='$Actor_Id'");

//display wether it worked or not

if(!$result)
{
    die('Could not delete records from the Sakila Database: ' . mysqli_error($db));
}

else
{


   echo "rows affected: ". mysqli_affected_rows($db);




}



CloseDb();




?>
<br>
<a href="insertRecords.php">Go Back</a>
