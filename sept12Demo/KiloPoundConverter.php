body>
<h1>Results:</h1>
<?php


if (isset($_POST['ConverttoPounds']))
{
    $kilosResult = $_POST['kilos'];

    $poundsResult = $kilosResult * 2.2;

    echo "<p>" + $kilosResult + " kilos equals " + $poundResult + " pounds.</p>";
}
elseif (!isset($_POST['ConverttoKilos']))
{
    $poundsResult = $_POST['pound'];

    $kilosResult = $poundsResult / 2.2;

    echo "<p>" + $poundsResult + " pounds equals " + $kilosResult + " kilos.</p>";
}
else
{
    echo "<p>Nothing to do.</p>";
}
?>
<p><a href="KiloPoundForm.html">Go back.</a></p>
</body>
</html>