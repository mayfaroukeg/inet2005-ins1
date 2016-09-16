
<body>

<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 9/16/16
 * Time: 2:39 PM
 */


echo ("<h1> Greetings from lab 1!!</h1>");

?>

<p> This is some text in a paraghraph</p>


<?php


echo ("<h3> This is h3 heading!!</h3>");

?>


<?php

 $name = "May";
  echo $name


?>
<p>

<?php
$string1 = "the sky is  ";
$string2 = "blue";

$result = $string1 . $string2;

echo $result

?>
<p>

<?php

$val1=32;
$val2= 14;
$val3=83;

$result2= ($val1*$val2)+$val3;


echo $result2;

?>
</p>

<p>
<?php

$val4=1024;
$val5=128;
$val6=7;

$result3= ($val4/$val5)-$val6;

echo $result3;
?>

    </p>

<p>

    <?Php
    $val7=769;
    $val8=6;

   $result4= $val7 % $val8;
    echo $result4;

?>
    <?php

		for($counter=10; $counter >= 1; $counter-- )
        {
            echo "<p>  " . $counter . " </p>";
        }


    ?>
<p>
    blast off
    </p>

<?php
// creating $Provinces[] array
$colors = array(
		“red”,
		“black”,
		“yellow”,
		“pink”,
		“blue”,
		“brown”,
		“green”,

		);


print_r ($colors);

?>


<?php
// creating $Provinces[] array
$colors = array(
		“red”,
		“black”,
		“yellow”,
		“pink”,
		“blue”,
		“brown”,
		“green”,

		);


	// printing $Provinces[] array which was already created

    // uses count() method
   for($counter=0; $counter < count($colors); $counter++ )
   {
       echo "<h1>$colors[$counter]</h1>";
   }



	// printing $Provinces[] array which was already created

   foreach ($colors as $ColorNumber => $clr)
   {
       echo "<h1>$colors $ColorNumber is $clr</h1>";
   }


?>






</p>
</body>
