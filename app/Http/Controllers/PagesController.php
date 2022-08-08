<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Controller for all out pages
    public function index(){
        return view('index');
    }
}
