
<h2>What is your zodiac sign ?</h2>
<form action="" method="get">
    <p>
        <label for="bdate">Enter birthday date
<input type="text" id="bdate" name="birth_d" placeholder="12.09"/>
        </label>
    </p>
    <p>
        <input type="submit" value="your sign">
    </p>
</form>
<?php

/*

******************DECEMBER***********************
 ================||======||==================

Sagittarius      21      22 Capricorn

/*
Capricorn   : 22 dec – 20 jan
Aquarius    : 21 jan – 18 feb
Pisces      : 19 feb – 20 mar
Aries       : 21 mar – 20 apr
Taurus      : 21 apr – 21 may
Gemini      : 22 may – 21 jun
Cancer      : 22 jun – 21 jul
Leo         : 22 jul – 23 aug
Virgo       : 24 aug – 22 sep
Libra       : 23 sep – 23 oct
Scorpio     : 24 oct – 22 nov
Sagittarius : 23 nov – 21 dec
 */



function getZodiazc($BirthDay)
{

    $dataArr = date_parse_from_format('d.m', $BirthDay);

    $month = $dataArr['month'];
    $day = $dataArr['day'];

    $point = [
        1 => 20, 2 => 18, 3 => 20,
        4 => 20, 5 => 21, 6 => 21,
        7 => 21, 8 => 23, 9 => 22,
        10 => 23, 11 => 22, 12 => 21
    ];
    $zodiac = [
        1 => ['name' => 'Capricorn', 'icon' => '?'],
        2 => ['name' => 'Aquarius', 'icon' => '?'],
        3 => ['name' => 'Pisces', 'icon' => '?'],
        4 => ['name' =>'Aries', 'icon' => '?'],
        5 => ['name' => 'Taurus', 'icon' => '?'],
        6 => ['name' => 'Gemini', 'icon' => '?'],
        7 => ['name' => 'Cancer', 'icon' => '?'],
        8 => ['name' => 'Leo', 'icon' => '?'],
        9 => ['name' => 'Virgo', 'icon' => '?'],
        10 => ['name' => 'Libra', 'icon' => '?'],
        11 => ['name' => 'Scorpio', 'icon' => '?'],
        12 => ['name' => 'Sagittarius', 'icon' => '?']
    ];
    function yourSign($month,$zodiac){
        $yourSign = $zodiac[$month]['name'];
        $icon = $zodiac[$month]['icon'];
        $type =  $yourSign.' '.$icon;
        return $type;
    }

    if ($day <= $point[$month]) { // index of zodiac is equal the month number
        return yourSign($month,$zodiac);
    } else { //if great then point
        $index = $month + 1; // switch to next sign
        if (!array_key_exists($index, $zodiac)) { //check if month great then 12
            return yourSign(1,$zodiac);
        } else {
            return yourSign($month+1,$zodiac);
        }
    }
}


if (isset($_REQUEST['birth_d']) && !empty($_REQUEST['birth_d'])){
    $bDay = $_REQUEST['birth_d'];
    echo 'Your sign  - '.getZodiazc($bDay);
}
