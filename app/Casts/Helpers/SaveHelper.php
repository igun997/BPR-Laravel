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

    public static function verifyDebit($id)
    {
        $debit = Save::where(["user_id"=>$id,"type"=>SaveType::DEBIT,"status"=>SaveStatus::VERIFIED])->sum("amount");
        return $debit;
    }

    public static function verifyKredit($id)
    {
        $kredit = Save::where(["user_id"=>$id,"type"=>SaveType::KREDIT,"status"=>SaveStatus::VERIFIED])->sum("amount");
        return $kredit;
    }

    public static function unverifyBalance($id)
    {
        $debit = Save::where(["user_id"=>$id,"type"=>SaveType::DEBIT,"status"=>SaveStatus::REVIEWED])->sum("amount");
        $kredit = Save::where(["user_id"=>$id,"type"=>SaveType::KREDIT,"status"=>SaveStatus::REVIEWED])->sum("amount");
        return ($kredit - $debit);
    }

    /**
     * @param $type
     * @param $status
     * @param $amount
     * @param $notes
     * @param $save_date
     * @param $user_id
     * @return bool
     */
    public static function createSave($type,$status,$amount,$notes,$save_date,$user_id)
    {
        $save = Save::create([
            "type"=>$type,
            "status"=>$status,
            "amount"=>$amount,
            "notes"=>$notes,
            "user_id"=>$user_id,
            "save_date"=>$save_date,
        ]);
        if ($save){
            return true;
        }

        return  false;
    }
}
