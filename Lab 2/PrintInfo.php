<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Lab2 PartA</title>
</head>
<body>
<?php
echo "<h1>This page was rendered in PHP Version " . phpversion() . "</h1>";
echo "<h1>The version number of PHP's Zend Scripting Engine is " . zend_version() . "</h1>";
echo "<h1>The Default Mime type of this PHP file is  " . ini_get("default_mimetype") . "</h1>";
?>
</body>
</html>