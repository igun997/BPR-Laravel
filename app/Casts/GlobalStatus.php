<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class GlobalStatus
{
    CONST INACTIVE = 0;
    CONST ACTIVE = 1;
    const DELETED = 2;

    public static function lang($level)
    {
        if ($level == self::ACTIVE){
            return "Aktif";
        }elseif ($level == self::INACTIVE){
            return "Tidak Aktif";
        }elseif ($level == self::DELETED){
            return "Di Hapus";
        }else{
            return  FALSE;
        }
    }
}
