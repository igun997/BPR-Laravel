<?php

namespace App\Http\Controllers\Master;

use App\Casts\LevelAccount;
use App\Http\Controllers\Controller;
use App\Models\ComplaintType;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Complaint extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "master.complaint";
        $this->middleware($this->allowedAccess([LevelAccount::ADMIN]));
    }


    public function index()
    {
        $title = "Kategori Pengaduan";
        $complaints = ComplaintType::all();
        return $this->loadView("index",compact("title","complaints"));
    }

    public function add()
    {
        $title = "Tambah Kategori Pengaduan";
        return $this->loadView("form",compact("title"));
    }

    public function add_action(Request $req)
    {
        $req->validate([
            "name"=>"required"
        ]);
        $create = ComplaintType::create($req->all());
        if ($create){
            return $this->successRedirect("master.complaint.list");
        }
        return  $this->failBack();
    }

    public function delete($id)
    {
        ComplaintType::findOrFail($id)->delete();
        return $this->successBack();
    }

    public function update(Request $req,$id)
    {
        $data = ComplaintType::findOrFail($id);
        $title = "Update Kategori Komplain";
        $route = route("master.complaint.update_action",$id);
        return $this->loadView("form",compact("title","data","route"));
    }

    public function update_action(Request $req,$id)
    {
        $req->validate([
            "name"=>"required"
        ]);
        $create = ComplaintType::where(["id"=>$id])->update($req->all());
        if ($create){
            return $this->successRedirect("master.complaint.list");
        }
        return  $this->failBack();
    }
}
