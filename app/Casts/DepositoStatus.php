<?php

namespace App\Casts;


class DepositoStatus
{
    const  DIBUAT = 0;
    const  DIKONFIRMASI = 1;
    const  BERJALAN = 2;
    const  SELESAI = 3;
    const  DIBERHENTIKAN = 4;


    public static function lang($level)
    {
        if ($level == self::DIBUAT){
            return "Deposito Dibuat";
        }elseif ($level == self::DIKONFIRMASI){
            return "Deposito Di Konfirmasi";
        }elseif ($level == self::BERJALAN){
            return "Deposito Sedang Berjalan";
        }elseif ($level == self::SELESAI){
            return "Deposito Selesai";
        }elseif ($level == self::DIBERHENTIKAN){
            return "Deposito Ditutup";
        }
    }

    public static function redirect()
    {
        return route("dashboard");
    }

}
