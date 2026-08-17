<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;

class ResourceController extends Controller
{
    public function culinaryResources()
    {
        $culinaryResources = Resource::where('category_id', '1')->get();
        
        return view('resources.culinary', [
            'resources' => $culinaryResources,
            'totalCount' => $culinaryResources->count()
        ]);
    }

    public function educationalResources()
    {
        $educationalResources = Resource::where('category_id', '2')->get();
        
        return view('resources.educational', [
            'resources' => $educationalResources,
            'totalCount' => $educationalResources->count()
        ]);
    }
}
