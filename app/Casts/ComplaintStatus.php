<?php

namespace App\Casts;


class ComplaintStatus
{
    const  DIBUAT = 0;
    const  DIKONFIRMASI = 1;
    const  DIPROSES = 2;
    const  PENGADUAN_SELESAI = 3;
    const  PENGADUAN_DITUTUP = 4;


    public static function lang($level)
    {
        if ($level == self::DIBUAT){
            return "Pengaduan Dibuat";
        }elseif ($level == self::DIKONFIRMASI){
            return "Pengaduan Di Konfirmasi";
        }elseif ($level == self::DIPROSES){
            return "Pengaduan Di Proses";
        }elseif ($level == self::PENGADUAN_SELESAI){
            return "Pengaduan Selesai";
        }elseif ($level == self::PENGADUAN_DITUTUP){
            return "Pengaduan Ditutup";
        }
    }

    public static function redirect()
    {
        return route("dashboard");
    }

}
