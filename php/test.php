<?php 
    function getColor($num) {
        $hash = md5('color' . $num); // modify 'color' to get a different palette
        $return_arr = array(
            hexdec(substr($hash, 0, 2)), // r
            hexdec(substr($hash, 2, 2)), // g
            hexdec(substr($hash, 4, 2))); //b
        $red = $return_arr[0];
        $green = $return_arr[1];
        $blue = $return_arr[2];
        $val = "rgba($red, $green, $blue, 0.6)";
        return $val;
    }
   echo( getColor(3));
?>