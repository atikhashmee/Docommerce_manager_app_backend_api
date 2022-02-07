<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index(Request $request) {
        $user = auth()->user();
        $data = Brand::where('store_id', $user->store_id)
        ->where('status', 'active')
        ->get();
        return response()->json($data);
    }
}
