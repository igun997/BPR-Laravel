<?php

namespace App\Http\Controllers\Landing;

use App\Casts\ProductStatus;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Index extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base  = "landing";
    }

    public function index()
    {
        $title = "Selamat Datang Di BPR Bakti Kencana";
        $product = Product::where(["status"=>ProductStatus::ACTIVE])->get();
        return $this->loadView("index",compact("title","product"));
    }
}
