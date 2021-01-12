<?php

namespace App\Http\Controllers\Master;

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
    }


    public function index()
    {
        $title = "Kategori Complaint";
        $complaints = ComplaintType::all();
        return $this->loadView("index",compact("title","complaints"));
    }
}
