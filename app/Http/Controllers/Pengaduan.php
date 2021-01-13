<?php

namespace App\Http\Controllers;

use App\Casts\LevelAccount;
use App\Models\Complaint;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Pengaduan extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "pengaduan";
        $this->middleware($this->allowedAccess([LevelAccount::CS]));
    }


    public function index()
    {
        $title = "Data Pengaduan";
        $pengaduan = Complaint::orderBy("status","ASC")->get();
        return $this->loadView("index",compact("title","pengaduan"));
    }

    public function detail($id)
    {
        $data = Complaint::findOrFail($id);
        $title = "Detail Pengaduan";
        return $this->loadView("detail",compact("title","data"));
    }

    public function delete($id)
    {
        Complaint::findOrFail($id)->delete();
        return $this->successBack(false);
    }


    public function update_status(Request $req)
    {
        $req->validate([
            "status"=>"required",
            "id"=>"required"
        ]);
        $create = Complaint::where(["id"=>$req->id])->update($req->all());
        if ($create){
            return $this->makeResponse(200);
        }
        return $this->makeResponse(400);

    }
}
