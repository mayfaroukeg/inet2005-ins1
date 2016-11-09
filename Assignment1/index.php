<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <title>View Records</title>

</head>
//logout button
<div class="logout"><input type='button' value='Click me to Logout' onClick="location.href='logout.php'" /></div>
<body>
<h1>Employee Table</h1>

<?php
//check log in
require('isLoggedIn.php');
checkLogin();
//connect to the database
require_once('database_connection.php');
$db = getDBConnection();

// echo search box form
    echo "<form action='index.php' method='POST'>";
    echo "<fieldset>
            <legend><h2>Enter First or last names to Search:</h2></legend>";
    echo "<input type='text' name='query' value='$query'/>";
    echo "<br/>";
    echo "<input type='submit' id='searchName' value='Search Name' />";
    echo "</fieldset></form>";

//get querry from form
$query='';
if(!empty($_POST['query'])){
    $query = $_POST['query'];
}


//draw heads of table
echo "<table>";
echo "<tr>  <th>Employee ID</a></th>
                <th><a href='index.php?order_by=fName'>First Name</a></th>
                <th><a href='index.php?order_by=lName'>Last Name</a></th>
                <th><a href='index.php?order_by=bDate'>Birth Date</a></th>
                <th>Hire Date</th>
                <th>Gender</th>
                <th>Edit</th>
                <th>Delete</th>
    </tr>";

// number of results to show in each page
    // finding how many rows in the table
    $sql = "SELECT COUNT(*) FROM employees";
    $result = mysqli_query($db, $sql);
    $r = mysqli_fetch_row($result);
    $numRows = $r[0];

    // number of rows to show per page
    $rowsPerPage = 25;
    // find out total pages
    $totalPages = ceil($numRows / $rowsPerPage);
//--------------------------------------------------------------------
    // get the current page from links or set 1 as default
    if (!empty($_GET['currentPage']) && is_numeric($_GET['currentPage'])) {
        // cast $currentPage var as int
        $currentPage = (int) $_GET['currentPage'];
    } else {
        // default page number
        $currentPage = 1;
    }
//----------------------------------------------------------------------
    // if current page is greater than total pages...
    if ($currentPage > $totalPages) {
        // set current page to last page
        $currentPage = $totalPages;
    } // end if
    // if current page is less than first page...
    if ($currentPage < 1) {
        // set current page to first page
        $currentPage = 1;
    } // end if

    // the begin of the list, based on current page
    $beginOfList = ($currentPage - 1) * $rowsPerPage;

//Main sql statment to make the table
    $sql_stmt = "SELECT * FROM employees";

//search form sql statment
    if(!empty($query)){
        $sql_stmt =  $sql_stmt . " WHERE first_name LIKE '%$query%' OR last_name LIKE '%$query%'";
    }
//table head sorting
    if(!empty($_GET['order_by']))
    {
        switch($_GET['order_by'])
        {
            case 'lName':
                $sql_stmt .= " ORDER BY last_name ASC";
                break;
            case 'fName':
                $sql_stmt .= " ORDER BY first_name ASC";
                break;
            case 'bDate':
                $sql_stmt .= " ORDER BY birth_date ASC";
                break;
            default:
                $sql_stmt .= " ORDER BY emp_no ASC";
                 break;
        }
    }

    //displaying a certain number of rows per page
    $sql_stmt =  $sql_stmt . " LIMIT $beginOfList, $rowsPerPage";

    $result = mysqli_query($db, $sql_stmt);


    if(!$result){
        die('Could not retrieve records from the Employees Database: ' . mysqli_error($db));
    }

// display data in table
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['emp_no'] . "</td> ";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['birth_date'] . "</td>";
        echo "<td>" . $row['hire_date'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo '<td><a href="update.php?emp_no=' . $row['emp_no'] . '"><img src="edit.png" alt="Edit"></a></td>';
        echo '<td><a href="delete.php?emp_no=' . $row['emp_no'] . '" onClick="return confirmDelete(this);">
        <img src="deleteX.jpg" alt="Delete"></a></td>';
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";


    // range of number links to show
    $range = 50;

    // if current page is more than 1
    if ($currentPage > 1) {
        // show << link to go back to page 1
        echo " <a href='{$_SERVER['PHP_SELF']}?currentPage=1'> go to page 1</a>";
        // get previous page num
        $prevPage = $currentPage - 1;
        // show < link to go back to 1 page
        echo "<a href='{$_SERVER['PHP_SELF']}?currentPage=$prevPage'>previous page</a> ";
    } // end if

    // loop to show links to range of pages around current page
    for ($x = ($currentPage - $range); $x < (($currentPage + $range) + 1); $x++) {
        // if it's a valid page number...
        if (($x > 0) && ($x <= $totalPages)) {
            // if we're on current page...
            if ($x == $currentPage) {
                // 'highlight' it but don't make a link
                echo " [<b>$x</b>] ";
                // if not current page...
            } else {
                // make it a link
                echo " <a href='{$_SERVER['PHP_SELF']}?currentPage=$x'>$x</a> ";
            } // end else
        } // end if
    } // end for

    // if not on last page, show forward and last page links
    if ($currentPage != $totalPages) {
        // get next page
        $nextPage = $currentPage + 1;
        // echo forward link for next page
        echo "<a href='{$_SERVER['PHP_SELF']}?currentPage=$nextPage'> next page</a>";
        // echo forward link for lastpage
        echo " <a href='{$_SERVER['PHP_SELF']}?currentPage=$totalPages'> go to last page</a>";
    } // end if
    /****** end build pagination links ******/?>
    <p><div class="add"><a href="add.php">Add a new record</a></div></p>


<script>
    function confirmDelete(link) {
        if (confirm("Confirm delete?")) {
            doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
        }
        return false;
    }

</script>


</body>

</html>