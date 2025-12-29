<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;

class ResourceController extends Controller
{
    //
    public function index()
    {
        return view('resources.index', [
            'culinary' => Resource::where('category_id', '1')->get(),
            'educational' => Resource::where('category_id', '2')->get()
        ]);
    }
}
