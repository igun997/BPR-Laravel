<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Pengajuan extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "laporan.pengajuan";
    }

    public function index()
    {

    }
}
