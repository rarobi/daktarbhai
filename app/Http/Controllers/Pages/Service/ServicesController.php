<?php

namespace App\Http\Controllers\Pages\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    //
    public function index()
    {
        return view('frontend.pages.services.index');
    }
}
