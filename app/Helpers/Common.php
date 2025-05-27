<?php 
function ShowDateTime($carbon, $format= "d M Y @ H:i"){
        return $carbon->traslatedFormat($format);
}

?>