<?php

namespace App\Http\Controllers\Master;

use App\Casts\LevelAccount;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Akun extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "master.akun";
        $this->middleware($this->allowedAccess([LevelAccount::ADMIN]));
    }


    public function index()
    {
        $title = "Data Akun";
        $complaints = User::all();
        return $this->loadView("index",compact("title","complaints"));
    }

    public function add()
    {
        $title = "Tambah Data Akun";
        return $this->loadView("form",compact("title"));
    }

    public function add_action(Request $req)
    {

        $create = User::create($req->all());
        if ($create){
            return $this->successRedirect("master.akun.list");
        }
        return  $this->failBack();
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return $this->successBack();
    }

    public function update(Request $req,$id)
    {
        $data = User::findOrFail($id);
        $title = "Update Data Akun";
        $route = route("master.akun.update_action",$id);
        return $this->loadView("form",compact("title","data","route"));
    }

    public function update_action(Request $req,$id)
    {

        $create = User::where(["id"=>$id])->update($req->all());
        if ($create){
            return $this->successRedirect("master.akun.list");
        }
        return  $this->failBack();
    }
}
