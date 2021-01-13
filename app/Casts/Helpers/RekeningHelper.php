<?php


namespace App\Casts\Helpers;



use App\Casts\LevelAccount;
use App\Casts\SaveStatus;
use App\Casts\SaveType;
use App\Casts\StatusAccount;
use App\Models\Save;
use App\Models\User;

class RekeningHelper
{
    const KODE_CABANG = 100;
    public static function generateRekening()
    {
        $current = User::where(["level"=>LevelAccount::NASABAH])->count()+1;
        return self::KODE_CABANG.".".str_pad($current,4,0,STR_PAD_LEFT).".".rand(1,9);
    }
}
