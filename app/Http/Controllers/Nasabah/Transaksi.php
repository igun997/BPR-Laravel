<?php

namespace App\Http\Controllers\Nasabah;

use App\Casts\LevelAccount;
use App\Http\Controllers\Controller;
use App\Models\Save;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Transaksi extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "nasabah.transaksi";
        $this->middleware($this->allowedAccess([LevelAccount::NASABAH]));
    }

    public function index()
    {
        $title = "History Transaksi";
        $saves = Save::where(["user_id"=>session()->get("id")])->orderBy("save_date","DESC")->get();

        return $this->loadView("index",compact("title","saves"));
    }

    public function detail($id)
    {
        $save = Save::where(["id"=>$id,"user_id"=>session()->get("id")])->first();
        $title = "Detail Transaksi #".str_pad($id,0,4,STR_PAD_LEFT);
        return $this->loadView("detail",compact("title","save"));
    }
}
