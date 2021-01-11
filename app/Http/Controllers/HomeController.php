<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{
    public function index()
    {
        if(!config('access.private')) {
            return redirect()->to('/s/share');
        } else {
            return view("home");
        }
    }
}
