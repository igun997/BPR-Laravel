<?php

namespace App\Casts;


class BorrowStatus
{
    const  DIAJUKAN = 0;
    const  DIKONFIRMASI = 1;
    const  SEDANG_DIREVIEW = 2;
    const  PENGAJUAN_DITERIMA = 3;
    const  PENGAJUAN_DITOLAK = 4;
    const  PROSES_PENCAIRAN = 5;
    const  PENCAIRAN_BERHASIL = 6;
    const  BERJALAN = 8;
    const  SELESAI = 9;
    const  DIBATALKAN = 7;


    public static function lang($level)
    {
        if ($level == self::DIAJUKAN){
            return "Sedang Di Ajukan";
        }elseif ($level == self::DIKONFIRMASI){
            return "Di Konfirmasi";
        }elseif ($level == self::SEDANG_DIREVIEW){
            return "Sedang Di Verifikasi";
        }elseif ($level == self::PENGAJUAN_DITERIMA){
            return "Pengajuan Di Terima";
        }elseif ($level == self::PENGAJUAN_DITOLAK){
            return "Pengajuan Di Tolak";
        }elseif ($level == self::PROSES_PENCAIRAN){
            return "Pencairan Di Proses";
        }elseif ($level == self::PENCAIRAN_BERHASIL){
            return "Pencairan Berhasil";
        }elseif ($level == self::DIBATALKAN){
            return "Pengajuan Di Batalkan";
        }elseif ($level == self::BERJALAN){
            return "Pinjaman Aktif";
        }elseif ($level == self::SELESAI){
            return "Pinjaman Selesai";
        }else{
            return  FALSE;
        }
    }
    public static function select($level)
    {
        $select = [];
        for ($i = 0; $i <= 9; $i++){
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
