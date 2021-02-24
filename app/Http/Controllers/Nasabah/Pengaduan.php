<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Pengaduan extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "nasabah.pengaduan";
    }

}
