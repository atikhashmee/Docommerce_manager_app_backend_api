<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $user = auth()->user();
        $data = Product::where('store_id', $user->store_id)
        ->where('status', 'active')
        ->get();
        return response()->json($data);
    }
}
