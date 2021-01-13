<?php

namespace App\Http\Controllers;

use App\Casts\Helpers\SaveHelper;
use App\Casts\LevelAccount;
use App\Casts\SaveStatus;
use App\Casts\SaveType;
use App\Casts\StatusAccount;
use App\Models\Save;
use App\Models\User;
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

    public function add($type = -1)
    {
        $title = "Pilih Nasabah";
        $nasabah = User::where(["level"=>LevelAccount::NASABAH,"status"=>StatusAccount::ACTIVE])->get();
        return $this->loadView("form",compact("title","nasabah","type"));
    }

    public function debit($user_id = null)
    {
        $title = "Tambah Transaksi DEBIT";
        $type = SaveType::DEBIT;
        $route = route("transaksi.submit",$user_id);
        $rules = [
            "min"=>10000,
            "max"=>SaveHelper::verifyBalance($user_id)
        ];
        return $this->loadView("form_transaksi",compact("type","title","route","user_id","rules"));
    }

    public function kredit($user_id = null)
    {
        $title = "Tambah Transaksi KREDIT";
        $type = SaveType::KREDIT;
        $route = route("transaksi.submit",$user_id);
        $rules = [
            "min"=>10000,
            "max"=>-1
        ];
        return $this->loadView("form_transaksi",compact("type","title","route","user_id","rules"));
    }

    public function submit(Request $req,$user_id)
    {
        $req->validate([
            "amount"=>"required|numeric|min:1",
            "notes"=>"min:4|nullable"
        ]);

        $data = $req->all();
        $data["user_id"] = $user_id;
        $data["status"] = SaveStatus::REVIEWED;
        if ($req->has("save_date") !== null){
            $data["save_date"] = date("Y-m-d");
        }

        $create = Save::create($data);
        if ($create){
            return $this->successRedirect("transaksi.detail",true,[$create->id]);
        }
        return  $this->failBack();
    }
}
