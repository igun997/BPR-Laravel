<?php

namespace App\Casts;


class SaveType
{
    const  DEBIT = 0;
    const  KREDIT = 1;


    public static function lang($level)
    {
        if ($level == self::DEBIT){
            return "Debit";
        }elseif ($level == self::KREDIT){
            return "Kredit";
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
