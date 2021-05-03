<?php 
    function getListDays($number){
        $days = [];
        $bitmask = strrev(decbin($number));
        for ($i = 0, $s = strlen($bitmask); $i < $s; $i++) {
            if ($bitmask{$i}) {
                $days[] = pow(2, $i);
            }
        }
        return $days;
    }

    function switchNumberToDay ($day) {
        switch ($day) {
            case 1:
                return "Sunday";
                break;
            case 2:
                return "Monday";
                break;
            case 4:
                return "Tuesday";
                break;
            case 8:
                return "Wednesday";
                break;
            case 16:
                return "Thursday";
                break;
            case 32:
                return "Friday";
                break;
            case 64:
                return "Saturday";
                break;
            default:
                return "Not Found WeekDay";
          }
    }

    function getListWeekday($number_day){
        $weekDay =[];
        $listDay = getListDays($number_day); // [1,16,32]
        foreach ($listDay as $list){
                array_push($weekDay, switchDay($list));   
        }
        return $weekDay;
    }

    //convert listday to number
    function switchDayToNumber ($str) {
        $str = strtolower($str);
        switch ($str) {
            case "sunday":
                return 1;
                break;
            case "monday":
                return 2;
                break;
            case "tuesday":
                return 4;
                break;
            case "wednesday":
                return 8;
                break;
            case "thursday":
                return 16;
                break;
            case "friday":
                return 32;
                break;
            case "saturday":
                return 64;
                break;
            default:
                return "Not Found WeekDay";
          }
    }

    function getNumberDay($days){
        $number = 0;
        foreach($days as $day){
            $number += switchDayToNumber($day);
        }
        return $number;
    }
?>