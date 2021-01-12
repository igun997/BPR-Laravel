<?php

namespace App\Casts;


class ProductStatus
{
    const  ACTIVE = 1;
    const  INACTIVE = 0;


    public static function lang($level)
    {
        if ($level == self::ACTIVE){
            return "Aktif";
        }elseif ($level == self::INACTIVE){
            return "Tidak Aktif";
        }
    }

    public static function select($level)
    {
        $select = [];
        for ($i = 0; $i <= 1; $i++){
            $select[] = [
                "id"=>$i,
                "text"=>self::lang($i),
                "selected"=>($level == $i)
            ];
        }
        return $select;
    }

    public static function redirect()
    {
        return route("dashboard");
    }

}
