<?php

namespace App\Http\Controllers;

use App\Casts\LevelAccount;
use App\Models\Save;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Transaksi extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "teller.transaksi";
        $this->middleware($this->allowedAccess([LevelAccount::TELLER,LevelAccount::KOORDINATOR_OPERASIONAL]));
    }

    public function index()
    {
        $title = "Data Transaksi";
        $saves = Save::all();
        return $this->loadView("index",compact("title","saves"));
    }

    public function detail($id)
    {
        $save = Save::find($id);
        $title = "Detail Transaksi #".str_pad($id,0,4,STR_PAD_LEFT);
        return $this->loadView("detail",compact("title","save"));
    }

    public function update_status(Request $req,$id)
    {
        $req->validate([
            "status"=>"required"
        ]);
        $save = Save::findOrFail($id);
        $save->status = $req->status;
        if ($save->save()){
            return $this->successBack(false);
        }
        return $this->failBack(false);
    }

    public function debit($user_id)
    {
        $title = "Tambah Transaksi DEBIT";

    }

    public function kredit($user_id)
    {

    }
}
