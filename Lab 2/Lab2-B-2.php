<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> Celcius to Fahrenheit conversion Table</title>
    <link rel="stylesheet" href="tablestyle.css" type="text/css"/>


</head>
<body>
<p>
    <a href="Lab2-B-1.php"> Fahrenheit to Celcius Conversion</a> |
    <a href="Lab2-B-2.php"> Celcius to Fahrenheit Conversion</a>
</p>

<!--Celcius to Fahrenheit Conversion-->

<table>
    <thead>
    <tr>
        <th>Celcius</th>
        <th>Fahrenheit</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for($celcius=0;$celcius<=100; $celcius+=1){
        echo  "<tr>";
        echo "<td>$celcius</td>";
        $fahrenheitStart = $celcius * (9/5);
        $fahrenheit = round($fahrenheitStart + 32);
        echo "<td>$fahrenheit</td>";
        echo "</tr>";
    }


    ?>
    </tbody>
</table>
</body>
</html>