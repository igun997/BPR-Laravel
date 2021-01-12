<?php

namespace App\Casts;


class ProductStatus
{
    const  ACTIVE = 1;
    const  INACTIVE = 0;
    const  DELETED = 2;


    public static function lang($level)
    {
        if ($level == self::ACTIVE){
            return "Aktif";
        }elseif ($level == self::INACTIVE){
            return "Tidak Aktif";
        }elseif ($level == self::DELETED){
            return "Di Hapus";
        }
    }

    public static function redirect()
    {
        return route("dashboard");
    }

}
