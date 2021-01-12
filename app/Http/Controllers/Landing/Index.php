<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
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
        return $this->loadView("index",compact("title"));
    }
}
