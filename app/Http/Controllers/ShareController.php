<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ShareController extends Controller
{
    public function index($shareKey = null)
    {
        if(config('access.private') && !in_array($shareKey, explode(",", config("access.keys")))) {
            abort(404);
        }

        $categories = Category::with(['children' => function ($query) {
            $query->orderBy('order');
        }, 'sites'])->with('parent')
            ->withCount('children')
            ->orderBy('order')
            ->get();

        return view('index')->with('categories', $categories);
    }
}
