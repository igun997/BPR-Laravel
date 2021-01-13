<?php

namespace App\Http\Controllers\Kredit;

use App\Casts\BorrowStatus;
use App\Casts\Helpers\BorrowHelper;
use App\Casts\Helpers\SaveHelper;
use App\Casts\LevelAccount;
use App\Casts\SaveStatus;
use App\Casts\SaveType;
use App\Http\Controllers\Controller;
use App\Models\Borrow;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Pengajuan extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "kredit.pengajuan";
        $this->middleware($this->allowedAccess([LevelAccount::KOORDINATOR_KREDIT,LevelAccount::ADMIN_KREDIT,LevelAccount::ANALIS_KREDIT]));
    }

    public function index()
    {
        $title = "Data Pengajuan Kredit";
        $borrow = Borrow::all();
        return $this->loadView("index",compact("title","borrow"));
    }

    public function detail($id)
    {
        $borrow = Borrow::findOrfail($id);
        $title = "Detail Pengajuan #".str_pad($id,4,0,STR_PAD_LEFT);
        return $this->loadView("detail",compact("title","borrow"));
    }

    public function update_status(Request  $req,$id)
    {
        $req->validate([
            "status"=>"required"
        ]);

        $borrow = Borrow::findOrFail($id);
        $borrow->status = $req->status;
        if ($borrow->save()){
            if ($req->status == BorrowStatus::BERJALAN){
                SaveHelper::createSave(SaveType::KREDIT,SaveStatus::VERIFIED,$borrow->amount,"Pencairan Pinjaman #".str_pad($id,4,0,0),date("Y-m-d"),$borrow->user_id);
            }
            return $this->successBack(false);
        }
        return $this->failBack(false);
    }
}
