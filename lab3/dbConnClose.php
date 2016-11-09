<?php
function connectToDb()
{
$dbConn = mysqli_connect("localhost","root", "inet2005","sakila");

if (!$dbConn)
{
    die('Could not connect to the Sakila Database: ' . mysqli_connect_error());
}
    return $dbConn;
}

function CloseDb()
{
    $dbConn = mysqli_connect("localhost","root", "inet2005","sakila");
mysqli_close($dbConn);

}
?>