<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use ZipStream\File;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successRedirect(string $route_name,bool $is_add = true,$params =[])
    {
        return redirect(route($route_name,$params))->with(["msg"=>(($is_add)?"Sukses Tambah Data":"Sukses Update Data")]);
    }
    public function successBack(bool $is_add = true)
    {
        return back()->with(["msg"=>(($is_add)?"Sukses Tambah Data":"Sukses Update Data")]);
    }

    public function failRedirect(string $route_name,bool $is_add = true)
    {
        return redirect(route($route_name))->withErrors(["msg"=>(($is_add)?"Gagal Tambah Data":"Gagal Update Data")]);
    }

    public function makeResponse($code=200,$data=[])
    {
        return response()->json(["code"=>$code,"data"=>$data],$code);
    }
    public function failBack(bool $is_add = true)
    {
        return back()->withErrors(["msg"=>(($is_add)?"Gagal Tambah Data":"Gagal Update Data")]);
    }

    public function allowedAccess($type = [])
    {
        return "gateway:".implode("|",$type);
    }

    public function uploader($req,$name)
    {
        $file = $req->file($name);
        $name = Str::random(10).".".$req->file($name)->getClientOriginalExtension();
        $upload = $file->storePubliclyAs("public/product",$name);
        if ($upload){
            $upload = str_replace("public",url("storage"),$upload);
        }
        return ($upload)??false;
    }
}
