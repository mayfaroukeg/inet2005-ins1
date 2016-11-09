<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php

$db=mysqli_connect{"localhost","root","inet2005","sakila"};

if (!$db) {
    die("connection error:".mysqli_connect_error());

}



//step 2 -Run A SQL Stament
$result= mysqli_querry ($db,"Select* From actor LMIT 0,10");

if (!result)
{

 die("Query eoor:", mysqli_error ($db))   ;

}

///Step 3 Display the result set

while($row=mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>$row .['first_name']".</td>;


    echo "</tr>";

}

?>

</body>
</html>