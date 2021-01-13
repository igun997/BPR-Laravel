<?php


namespace App\Casts\Helpers;



use App\Casts\SaveStatus;
use App\Casts\SaveType;
use App\Models\Save;

class SaveHelper
{
    public static function verifyBalance($id)
    {
        $debit = Save::where(["user_id"=>$id,"type"=>SaveType::DEBIT,"status"=>SaveStatus::VERIFIED])->sum("amount");
        $kredit = Save::where(["user_id"=>$id,"type"=>SaveType::KREDIT,"status"=>SaveStatus::VERIFIED])->sum("amount");
        return ($kredit - $debit);
    }

    public static function unverifyBalance($id)
    {
        $debit = Save::where(["user_id"=>$id,"type"=>SaveType::DEBIT,"status"=>SaveStatus::REVIEWED])->sum("amount");
        $kredit = Save::where(["user_id"=>$id,"type"=>SaveType::KREDIT,"status"=>SaveStatus::REVIEWED])->sum("amount");
        return ($kredit - $debit);
    }
}
