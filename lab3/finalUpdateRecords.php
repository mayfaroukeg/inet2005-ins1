<?php

//step 1 connect
require_once 'dbConnClose.php';
$db= connectToDb();

//step 2 run sql statment

$actor_id=$_POST['actor_id'];
$first_name=$_POST['firstName'];
$last_name=$_POST['lastName'];

$result = mysqli_query($db,"UPDATE actor SET first_name = '$first_name', last_name = '$last_name' WHERE actor_id = '$actor_id';");
if(!$result)
{
    die('Could not update record in the Sakila Database: ' . mysqli_error($db));
}
Else
{
    echo "Record updated";
}

CloseDb();

?>