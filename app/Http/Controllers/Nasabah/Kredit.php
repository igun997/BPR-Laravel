<?php

namespace App\Http\Controllers\Nasabah;

use App\Casts\LevelAccount;
use App\Casts\ProductStatus;
use App\Casts\ProductType;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Kredit extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "nasabah.kredit";
        $this->middleware($this->allowedAccess([LevelAccount::NASABAH]));
    }

    public function index()
    {
        $title = "Pengajuan Kredit Online";
        $products = Product::where(["type"=>ProductType::KREDIT,"status"=>ProductStatus::ACTIVE])->get();
        return $this->loadView("index",compact("title","products"));
    }
}
