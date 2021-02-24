<?php

namespace App\Http\Controllers\Nasabah;

use App\Casts\ComplaintStatus;
use App\Casts\LevelAccount;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Pengaduan extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->middleware($this->allowedAccess([LevelAccount::NASABAH]));
        $this->base = "nasabah.pengaduan";
    }

    public function index()
    {
        $title = "Pengaduan";
        $data = Complaint::where(["user_id"=>session()->get("id")])->get();
        return $this->loadView("index",compact("data","title"));
    }

    public function detail($id)
    {
        $title = "Detail Pengaduan";
        $data = Complaint::findOrFail($id)
        return $this->loadView("detail",compact("title","data"));
    }
    public function add()
    {
        $title = "Tambah Pengaduan";
        return $this->loadView("form",compact("title"));
    }

    public function add_action(Request $req)
    {
        $req->validate([
            "subject"=>"required",
            "complaint_type_id"=>"required",
            "content"=>"required"
        ]);
        $data = $req->all();
        $data["user_id"] = session()->get("id");
        $data["status"] = ComplaintStatus::DIBUAT;
        $create = Complaint::create($data);
        if ($create){
            return $this->successRedirect("nasabah.pengaduan.list");
        }
        return $this->failBack();
    }

}
