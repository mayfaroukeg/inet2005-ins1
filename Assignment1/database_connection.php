
<?php
//connect to database
function getDBConnection(){
    $db = mysqli_connect("localhost","root", "inet2005","employees");
    if (!$db)
    {
        die('Error: Could not connect to  Employees Database: ' . mysqli_error($db));
    }

    return $db;
}