<?php

namespace App\Http\Controllers\Master;

use App\Casts\LevelAccount;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class ProductsControl extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "master.produk";
        $this->middleware($this->allowedAccess([LevelAccount::ADMIN]));
    }


    public function index()
    {
        $title = "Produk";
        $complaints = Product::all();
        return $this->loadView("index",compact("title","complaints"));
    }

    public function add()
    {
        $title = "Tambah Produk";
        return $this->loadView("form",compact("title"));
    }

    public function add_action(Request $req)
    {
        $data = $req->all();
        if ($req->has("img")){
            $data["img"] = $this->uploader($req,"img");
            if( $data["img"] == null){
                $data["img"] = "-";
            }
        }else{
            $data["img"] = "-";
        }
        $create = Product::create($data);
        if ($create){
            return $this->successRedirect("master.produk.list");
        }
        return  $this->failBack();
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return $this->successBack();
    }

    public function update(Request $req,$id)
    {
        $data = Product::findOrFail($id);
        $title = "Update Produk";
        $route = route("master.produk.update_action",$id);
        return $this->loadView("form",compact("title","data","route"));
    }

    public function update_action(Request $req,$id)
    {
        $data = $req->all();
        if ($req->has("img")){
            $data["img"] = $this->uploader($req,"img");
            if( $data["img"] == null){
                $data["img"] = "-";
            }
        }
        $create = Product::where(["id"=>$id])->update($data);
        if ($create){
            return $this->successRedirect("master.produk.list");
        }
        return  $this->failBack();
    }
}
