<?php 

namespace App\Utilities;

class FormatDate {

    public static function date_format(){
        $current_date_time = new \DateTime("now");
        $user_current_date = $current_date_time->format("Y-m-d");
        return $user_current_date;
    }
}