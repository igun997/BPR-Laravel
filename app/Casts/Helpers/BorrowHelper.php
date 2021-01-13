<?php


namespace App\Casts\Helpers;



use App\Casts\BorrowInstallmentStatus;
use App\Casts\BorrowStatus;
use App\Casts\LevelAccount;
use App\Casts\SaveStatus;
use App\Casts\SaveType;
use App\Casts\StatusAccount;
use App\Models\Borrow;
use App\Models\BorrowInstallment;
use App\Models\Save;
use App\Models\User;

class BorrowHelper
{
    public static function verifyLoan($borrow_id)
    {
        $total = Borrow::find($borrow_id)->amount;
        $installment = BorrowInstallment::where(["status"=>BorrowInstallmentStatus::DIVERIFIKASI,"borrow_id"=>$borrow_id])->sum("amount");
        return ((self::pengembalian($borrow_id)) - $installment);
    }

    public static function autoCheck($borrow_id)
    {
        $total = Borrow::find($borrow_id)->amount;
        $installment = BorrowInstallment::where(["status"=>BorrowInstallmentStatus::DIVERIFIKASI,"borrow_id"=>$borrow_id])->sum("amount");
        if(((self::pengembalian($borrow_id)) - $installment) == 0){
            $b = Borrow::find($borrow_id); $b->status = BorrowStatus::SELESAI; $b->save();
            return true;
        }
        return  false;
    }

    public static function pengembalian($id)
    {
        $borrow = Borrow::find($id);

        $total = $borrow->amount;
        $interest = $borrow->interest;

        return (($total*($interest/100)) + $total);
    }
}
