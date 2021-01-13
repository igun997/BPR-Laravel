<?php

namespace App\Http\Controllers;

use App\Casts\LevelAccount;
use App\Models\User;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;

class Teller extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "teller.nasabah";
        $this->middleware($this->allowedAccess([LevelAccount::TELLER]));
    }

    public function index()
    {
        $title = "Data Nasabah";
        $nasabah = User::where(["level"=>LevelAccount::NASABAH])->get();
        return $this->loadView("index",compact("title","nasabah"));
    }
}
