<?php

namespace App\Casts;


class LevelAccount
{
    const  ADMIN = 0;
    const  TELLER = 1;
    const  CS = 2;
    const  KOORDINATOR_OPERASIONAL = 3;
    const  KOORDINATOR_KREDIT = 4;
    const  ADMIN_KREDIT = 5;
    const  ANALIS_KREDIT = 6;
    const  NASABAH = 7;


    public static function lang($level)
    {
        if ($level == LevelAccount::ADMIN){
            return "Admninistrator";
        }elseif ($level == LevelAccount::NASABAH){
            return "Nasabah";
        }elseif ($level == LevelAccount::CS){
            return "CS";
        }elseif ($level == LevelAccount::TELLER){
            return "Teller";
        }elseif ($level == LevelAccount::KOORDINATOR_KREDIT){
            return "Koordinator Kredit";
        }elseif ($level == LevelAccount::KOORDINATOR_OPERASIONAL){
            return "Koordinator Operasional";
        }elseif ($level == LevelAccount::ADMIN_KREDIT){
            return "Admin Kredit";
        }elseif ($level == LevelAccount::ANALIS_KREDIT){
            return "Analis Kredit";
        }else{
            return  FALSE;
        }
    }

    public static function select($level)
    {
        $select = [];
        for ($i = 0; $i <= 7; $i++){
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
