<?php

namespace App\Casts;


class BorrowInstallmentStatus
{
    const  DIBUAT = 0;
    const  DIPERIKSA = 1;
    const  DIVERIFIKASI = 2;
    const  DITOLAK = 3;


    public static function lang($level)
    {
        if ($level == self::DIBUAT){
            return "Menunggu Konfirmasi";
        }elseif ($level == self::DIPERIKSA){
            return "Sedang Di Konfirmasi";
        }elseif ($level == self::DIVERIFIKASI){
            return "Terverifikasi";
        }elseif ($level == self::DITOLAK){
            return "Ditolak";
        }else{
            return  FALSE;
        }
    }
    public static function select($level)
    {
        $select = [];
        for ($i = 0; $i <= 3; $i++){
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
