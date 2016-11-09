<?php
//step 1 connect
require_once 'database_connection.php';
$db= getDBConnection();

//step 2 run sql statment
$first_name=$_POST['firstName'];
$last_name=$_POST['lastName'];


$result = mysqli_query($db,"INSERT INTO employees (first_name, last_name) VALUES('$first_name', '$last_name')");

//display wether it worked or not

if(!$result)
{
    die('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));
}

else
{


    $result = mysqli_query($db,"SELECT * FROM employees");
    if(!$result)
    {
        die('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));
    }
    while ($row = mysqli_fetch_assoc($result))
    {
        echo "record updated";
        echo "<br />";
    }




}



echo "<p>"."<a href='index.php'>" ."<h2>Back to the Main Page</h2></a></p>";;




?>

