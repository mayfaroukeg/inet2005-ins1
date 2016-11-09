<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="Films Table">


    <link rel="stylesheet" href="css/styles.css?v=1.0">


</head>

<body>
<table>
    <style type="text/css">
        table,th,td
        {
            border:1px solid black;
        }
    </style>

    <thead>

    <tr>

        <th>Title</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>



<?php

require_once 'dbConnClose.php';
$db= connectToDb();

$searchTerm=$_POST ['searchTerm'];

$result = mysqli_query($db,"SELECT * FROM film WHERE description LIKE '%$searchTerm%'");    // % - is the SQL wildcard
if(!$result)
{
    die('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));
}

while ($row = mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo"<td>". $row['title']. "</td>";
    echo"<td>". $row['description']. "</td>";

    echo "</tr>";
}

CloseDb();

?>
    </tbody>
</table>
</body>
</html>