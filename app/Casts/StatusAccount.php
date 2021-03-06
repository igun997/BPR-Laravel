<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class StatusAccount
{
    CONST INACTIVE = 0;
    CONST ACTIVE = 1;

    public static function lang($level)
    {
        if ($level == self::ACTIVE){
            return "Aktif";
        }elseif ($level == self::INACTIVE){
            return "Tidak Aktif";
        }else{
            return  FALSE;
        }
    }

    public static function select($level)
    {
        $select = [];
        for ($i = 0; $i <= 2; $i++){
            $select[] = [
                "id"=>$i,
                "text"=>self::lang($i),
                "selected"=>($level == $i)
            ];
        }
        return $select;
    }
}
