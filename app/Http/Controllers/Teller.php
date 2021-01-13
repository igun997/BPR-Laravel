<?php

namespace App\Http\Controllers;

use App\Casts\LevelAccount;
use App\Models\User;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Teller extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "teller.nasabah";
        $this->middleware($this->allowedAccess([LevelAccount::TELLER]));
    }

    public function index()
    {
        $title = "Data Nasabah";
        $nasabah = User::where(["level"=>LevelAccount::NASABAH])->get();
        return $this->loadView("index",compact("title","nasabah"));
    }

    public function detail($id)
    {
        $title = "Detail Nasabah";
        $nasabah = User::where(["id"=>$id,"level"=>LevelAccount::NASABAH])->first();
        if ($nasabah){
            return $this->loadView("detail",compact("nasabah","title"));
        }
        return $this->failBack(false);
    }

    public function update_status(Request $req,$id)
    {
        $req->validate([
            "status"=>"required"
        ]);
        $create = User::where(["id"=>$id])->update(["status"=>$req->status]);
        if ($create){
            return $this->successRedirect("teller.list",false);
        }
        return  $this->failBack(false);
    }
}
