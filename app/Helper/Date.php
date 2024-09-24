<?php
namespace App\Helper;

use Carbon\Carbon;

class Date
{
    public static function FormatHtml5($dateTime, $format = 'Y-m-d')
    {
        return Carbon::parse($dateTime)->format($format);
    }

    public static function Format($dateTime, $format = 'l d/m/Y')
    {
        return Carbon::parse($dateTime)->format($format);
    }
}

?>