<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Fahrenheit to Celcius conversion Table</title>
    <link rel="stylesheet" href="tablestyle.css" type="text/css"/>
</head>
<body>

<p>
    <a href="Lab2-B-1.php"> Fahrenheit to Celcius Conversion</a> |
    <a href="Lab2-B-2.php"> Celcius to Fahrenheit Conversion</a>
</p>

<!--Step 1-->

<!--Fahrenheit to Celcius Conversion-->
<?php

?>
<table>
    <thead>
    <tr>
        <th>Fahrenheit</th>
        <th>Celcius</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for($fahrenheit=0;$fahrenheit<=100; $fahrenheit+=1){
        echo  "<tr>";
        echo "<td>$fahrenheit</td>";
        $celciusStart = 32 - $fahrenheit;
        $celcius = round($celciusStart * (5/9));
        echo "<td>$celcius</td>";
        echo "</tr>";
    }


    ?>
    </tbody>
</table>
</body>
</html>