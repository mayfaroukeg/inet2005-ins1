<?php

//?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Update form </title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <div class="topCorner"><input type='button' value='Click me to Logout' onClick="location.href='logout.php'" /></div>
    <script src="script.js"></script>
</head>
<body>
//PreLoad the Information To be Updated in the Employees
<form id="myForm" name="myForm" method="post" action="update_emp.php" onsubmit="return validateorm()">
    <?php
    require_once('database_connection.php');
    $db = getDBConnection();
    $id = $_GET['emp_no'];

    $sqlStatement = "SELECT * FROM employees WHERE emp_no = ";
    $sqlStatement.= $id;
    $sqlStatement.= ";";
    $result = mysqli_query($db, $sqlStatement);

    while($row = mysqli_fetch_assoc($result)){?>
        <p><input type="hidden" name="id" value="<?php echo $row['emp_no'];?>" /></p>
        <p><label>Employee ID:</label> <?php echo $id; ?></p>
        <p><label>First Name: <input type="text" name="firstName" value="<?php echo $row['first_name'];?>" id="firstName" size="20" onblur="anyText(this,'You must enter a first name please','firstNameWarning')"/> </label> &nbsp;&nbsp;<span id="firstNameWarning"></span><br /></p>
        <p><label>Last  Name: <input type="text" name="lastName" value="<?php echo $row['last_name'];?>" id="lastName" size="20" onblur="anyText(this,'You must enter a last name please','lastNameWarning')"/></label>&nbsp;&nbsp;<span id="lastNameWarning"></span><br /></p>
        <p><label>Birth Date: <input type="date" name="birthDate" value="<?php echo $row['birth_date'];?>" id="birthDate" onblur="anyText(this,'You must enter your birth date please','birthDateWarning')"/></label>&nbsp;&nbsp;<span id="birthDateWarning"></span><br /></p>
        <p><label>Hire Date: <input type="date" name="hireDate" value="<?php echo $row['hire_date'];?>" id="hireDate" onblur="anyText(this,'You must enter your hire date please','hireDateWarning')"/></label>&nbsp;&nbsp;<span id="hireDateWarning"></span><br /></p>
        <p><label>Gender: </label>
            <input type="radio" name="gender" id="genderFemale" value="F"<?php if (isset($row['gender']) && $row['gender']=="F") echo "checked"; ?>/>F
            <input type="radio" name="gender" id="genderMale" value="M" <?php if (isset($row['gender']) && $row['gender']=="M") echo "checked"; ?>/>M
            &nbsp;&nbsp;<span id="radioButtonError"></span></p></p>
        <?php
    }?>
    <p><button type = "submit" id="update" name = "update" > Update</button ></p>
</form>

</body>
</html>