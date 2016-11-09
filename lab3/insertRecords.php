<?php
//step 1 connect
require_once 'dbConnClose.php';
$db= connectToDb();

//step 2 run sql statment
$first_name=$_POST['firstName'];
$last_name=$_POST['lastName'];


$result = mysqli_query($db,"INSERT INTO actor (first_name, last_name) VALUES('$first_name', '$last_name')");

//display wether it worked or not

if(!$result)
{
    die('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));
}

else
{


    $result = mysqli_query($db,"SELECT * FROM actor ORDER BY actor_id DESC LIMIT 10");
    if(!$result)
    {
        die('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));
    }
    while ($row = mysqli_fetch_assoc($result))
    {
        echo $row ['actor_id']. " " .$row['first_name'] . " " . $row['last_name'];
        echo "<br />";
    }




}



CloseDb();




?>