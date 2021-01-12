<?php

namespace App\Casts;


class SaveStatus
{
    const  VERIFIED = 1;
    const  REJECTED = 0;
    const  REVIEWED = 2;


    public static function lang($level)
    {
        if ($level == self::VERIFIED){
            return "Terverifikasi";
        }elseif ($level == self::REJECTED){
            return "Ditolak";
        }elseif ($level == self::REVIEWED){
            return "Sedang Di Periksa";
        }
    }

    public static function redirect()
    {
        return route("dashboard");
    }

}
