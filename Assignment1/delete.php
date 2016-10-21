<?php

//?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Delete to the Actor</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <div class="topCorner"><input type='button' value='Click me to Logout' onClick="location.href='logout.php'" /></div>
</head>
<body>
<?php

    //connect to the database
    require_once('database_connection.php');
    $db = getDBConnection();

    // check if the 'emp_no' variable is set in URL, and check that it is valid
    if (isset($_GET['emp_no']) && is_numeric($_GET['emp_no'])){
        $emp_no = $_GET['emp_no'];

        // delete the entry
        $result = mysqli_query($db, "DELETE FROM employees WHERE emp_no='$emp_no'");
        if(!$result)
        {
            die('<h2>Could not delete record into the Employees Database: ' . mysqli_error($db) . '</h2>');
            echo "<p>"."<a href='index.php'>" ."<h2>Back to the Main Page</h2></a></p>";
        }
        Else
        {
            echo "<p><h2>Successfully deleted: " . mysqli_affected_rows($db) . " record(s)</h2></p>";
            echo "<p>"."<a href='index.php'>" ."</h2>Back to the Main Page</h2></a></p>";
        }
        mysqli_close($db);
    }
    else {
        echo "<p>"."<a href='index.php'>" ."</h2>Back to the Main Page</h2></a></p>";
    }
?>
</form>
</body>
</html>