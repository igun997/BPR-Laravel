<?php

namespace App\Http\Controllers\Nasabah;

use App\Casts\BorrowInstallmentStatus;
use App\Casts\BorrowStatus;
use App\Casts\Helpers\BorrowHelper;
use App\Casts\Helpers\SaveHelper;
use App\Casts\LevelAccount;
use App\Casts\ProductStatus;
use App\Casts\ProductType;
use App\Casts\SaveStatus;
use App\Casts\SaveType;
use App\Http\Controllers\Controller;
use App\Models\Borrow;
use App\Models\BorrowInstallment;
use App\Models\Product;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Kredit extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "nasabah.kredit";
        $this->middleware($this->allowedAccess([LevelAccount::NASABAH]));
    }

    public function index()
    {
        $title = "Pengajuan Kredit Online";
        $in_progress = false;
        $current = null;
        $check = Borrow::where(["user_id"=>session()->get("id")])->whereIn("status",[BorrowStatus::PENCAIRAN_BERHASIL,BorrowStatus::DIKONFIRMASI,BorrowStatus::SEDANG_DIREVIEW,BorrowStatus::BERJALAN,BorrowStatus::PROSES_PENCAIRAN,BorrowStatus::DIAJUKAN]);
        if ($check->count() > 0){
            $in_progress = true;
            $current = $check->first();
            BorrowHelper::autoCheck($current->id);
        }
        $products = Product::where(["type"=>ProductType::KREDIT,"status"=>ProductStatus::ACTIVE])->get();
        return $this->loadView("index",compact("title","products","in_progress","current"));
    }

    public function klaim($id)
    {
        $product = Product::findOrFail($id);
        $user_id = session()->get("id");
        $payload = [
            "amount"=>$product->total,
            "month_term"=>$product->month_term,
            "status"=>BorrowStatus::DIAJUKAN,
            "interest"=>$product->interest,
            "product_id"=>$id,
            "user_id"=>$user_id
        ];
        $create = Borrow::create($payload);
        if ($create){
            return back()->with(["msg"=>"Klaim Telah Di Ajukan"]);
        }
        return  back()->withErrors(["msg"=>"Gagal Mengajukan Klaim"]);
    }

    public function angsuran($id)
    {
        $borrow = Borrow::where(["id"=>$id,"status"=>BorrowStatus::BERJALAN]);
        if ($borrow->count() > 0){
            $borrow = $borrow->first();
            $title = "Pembayaran Angsuran #".str_pad($id,4,0,STR_PAD_LEFT);
            return $this->loadView("angsuran",compact("title","borrow"));
        }
        return back()->withErrors(["msg"=>"Tidak Dapat Menemukan Pinjaman Anda"]);
    }

    public function autodebet($id)
    {
        $borrow = Borrow::where(["id"=>$id,"status"=>BorrowStatus::BERJALAN]);
        if ($borrow->count() > 0){
            $borrow = $borrow->first();
            $sisa = SaveHelper::verifyBalance(session()->get("id"));
            $angsuran = (($borrow->amount*($borrow->interest/100))+$borrow->amount)/$borrow->month_term;
            if ($angsuran > $sisa){
                return  back()->withErrors(["msg"=>"Saldo Tidak Cukup"]);
            }
            $payload = [];
            $payload["status"] = BorrowInstallmentStatus::DIBUAT;
            $payload["borrow_id"] = $id;
            $payload["amount"] = $angsuran;
            $create = BorrowInstallment::create($payload);
            $charges = SaveHelper::createSave(SaveType::DEBIT,SaveStatus::VERIFIED,$angsuran,"Pembayaran Angsuran #".str_pad($id,4,0,STR_PAD_LEFT),date("Y-m-d"),session()->get("id"));
            if ($create && $charges){
                BorrowHelper::autoCheck($id);
                return redirect(route("nasabah.kredit.list"))->with(["msg"=>"Angsuran Telah Dikirim"]);
            }
            $create->delete();
            return back()->withErrors(["msg"=>"Angsuran Gagal Dikirim"]);
        }
        return back()->withErrors(["msg"=>"Tidak Dapat Menemukan Pinjaman Anda"]);
    }

    public function history_installment($id)
    {
        $borrow = Borrow::findOrFail($id);
        $title = "Catatan Angsuran #".str_pad($id,4,0,STR_PAD_LEFT);
        return $this->loadView("history_installment",compact("title","borrow"));
    }
}
