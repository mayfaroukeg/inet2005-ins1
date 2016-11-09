<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>PHP Form With Get </title>
</head>
<body>

<h2>
    <?php


    function convertMonthNameToNumber($month){

        if($month == 'January'){
            $monthNumber = 1;
        }else
            if($month == 'February') {
                $monthNumber = 2;
            }else
                if($month == 'March'){
                    $monthNumber = 3;
                }else
                    if($month == 'April') {
                        $monthNumber = 4;
                    }else
                        if($month == 'May') {
                            $monthNumber = 5;
                        }else
                            if($month == 'June') {
                                $monthNumber = 6;
                            }else
                                if($month == 'July') {
                                    $monthNumber = 7;
                                }else
                                    if($month == 'August'){
                                        $monthNumber = 8;
                                    }else
                                        if($month == 'September'){
                                            $monthNumber = 9;
                                        }else
                                            if($month == 'October') {
                                                $monthNumber = 10;
                                            }else
                                                if($month == 'November'){
                                                    $monthNumber = 11;
                                                }else
                                                    if($month == 'December'){
                                                        $monthNumber = 12;
                                                    }
        return $monthNumber;
    }


    function calZodiac($monthNumber, $day) {

        $calZodiac = "";

        if     ( ( $monthNumber == 3 && $day > 20 ) || ( $monthNumber == 4 && $day < 20 ) ) { $calZodiac = "Aries"; }
        elseif ( ( $monthNumber == 4 && $day > 19 ) || ( $monthNumber == 5 && $day < 21 ) ) { $calZodiac = "Taurus"; }
        elseif ( ( $monthNumber == 5 && $day > 20 ) || ( $monthNumber == 6 && $day < 21 ) ) { $calZodiac = "Gemini"; }
        elseif ( ( $monthNumber == 6 && $day > 20 ) || ( $monthNumber == 7 && $day < 23 ) ) { $calZodiac = "Cancer"; }
        elseif ( ( $monthNumber == 7 && $day > 22 ) || ( $monthNumber == 8 && $day < 23 ) ) { $calZodiac = "Leo"; }
        elseif ( ( $monthNumber == 8 && $day > 22 ) || ( $monthNumber== 9 && $day < 23 ) ) { $calZodiac = "Virgo"; }
        elseif ( ( $monthNumber == 9 && $day > 22 ) || ( $monthNumber == 10 && $day < 23 ) ) { $calZodiac = "Libra"; }
        elseif ( ( $monthNumber == 10 && $day > 22 ) || ( $monthNumber== 11 && $day < 22 ) ) { $calZodiac = "Scorpio"; }
        elseif ( ( $monthNumber == 11 && $day > 21 ) || ( $monthNumber == 12 && $day < 22 ) ) { $calZodiac = "Sagittarius"; }
        elseif ( ( $monthNumber == 12 && $day > 21 ) || ( $monthNumber== 1 && $day < 20 ) ) { $calZodiac = "Capricorn"; }
        elseif ( ( $monthNumber == 1 && $day > 19 ) || ( $monthNumber == 2 && $day < 19 ) ) { $calZodiac = "Aquarius"; }
        elseif ( ( $monthNumber == 2 && $day > 18 ) || ( $monthNumber == 3 && $day < 21 ) ) { $calZodiac = "Pisces"; }

        return $calZodiac;
    }

    echo nl2br("This is your name and horoscope: \n\n");
    if (isset($_GET['Submit'])) {
        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
        echo nl2br("Your Name is: " . $firstName ." ". $lastName . " !\n");

        $monthName = $_GET['birthMonth'];
        echo $monthName;
        $month = convertMonthNameToNumber($monthName);
        echo $month;
        $day = $_GET['birthDay'];
        if (isset($_GET['birthDay']) && $_GET['birthMonth']!='') {
            $calZodiac = calZodiac($month, $day);
            echo  " Your Zodiac is:  " . $calZodiac ;
        }

    }

    ?>
</h2>
</body>
</html>