<?php

//?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <script src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <title>Inserted into the Employees</title>
    <div class="topCorner"><input type='button' value='Click me to Logout' onClick="location.href='logout.php'" /></div>
</head>
<body>



<?php

require_once('database_connection.php');
$db = getDBConnection();


function convertDateToYYYYmmdd($dateVariable){
    $dateVariable = str_replace('/','-',$dateVariable);
    $dateVariable = date('Y-m-d' , strtotime($dateVariable));
    return $dateVariable;
}

if (!empty($_POST['firstName']) && !empty($_POST['lastName'])&& !empty($_POST['birthDate']) &&  !empty($_POST['hireDate']) && !empty($_POST['gender'])) {

    $bDate = convertDateToYYYYmmdd($_POST['birthDate']);
    $hDate = convertDateToYYYYmmdd($_POST['hireDate']);

    $result = mysqli_query($db, "select (employees.emp_no) as EmployeeId FROM employees");
    while ($row = mysqli_fetch_row($result)) {
        $employeeId = $row[0] + 1;
    }

    $sqlStatement = "INSERT INTO employees (emp_no, first_name, last_name, birth_date, hire_date,gender) VALUES ('";
    $sqlStatement .= $employeeId;
    $sqlStatement .= "','";
    $sqlStatement .= ucfirst($_POST['firstName']);
    $sqlStatement .= "','";
    $sqlStatement .= ucfirst($_POST['lastName']);
    $sqlStatement .= "','";
    $sqlStatement .= $bDate;
    $sqlStatement .= "','";
    $sqlStatement .= $hDate;
    $sqlStatement .= "','";
    $sqlStatement .= $_POST['gender'];
    $sqlStatement .= "');";

    $insertResult = mysqli_query($db, $sqlStatement);

    if (!$insertResult) {
        die('<h2>Could not insert record into the Employees Database: ' . mysqli_error($db) . '</h2>');
    } Else {
        echo "<h2>New record inserted.</h2>";
        echo "<p>"."<a href='index.php'>" ."<h2>Back to the Main Page</h2></a></p>";
    }

    mysqli_close($db);
}
else {
    echo "<h2>" . "Nothing To Do" . "</h2>";
    echo "<p>"."<a href='index.php'>" ."<h2>Back to the Main Page</h2></a></p>";;
}
?>

</body>
</html>
