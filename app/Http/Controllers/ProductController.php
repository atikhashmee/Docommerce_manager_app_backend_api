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
        ->paginate(10);
        return response()->json($data);
    }

    public function show(Request $request, $id) {
        $user = auth()->user();
        $data = Product::with(
            'variants',
            'images',
            'originalImages',
            'shippings',
            'tags',
            'stocks',
            'parameters',
            'category',
            'categories'
        )
        ->where('store_id', $user->store_id)
        ->where('id', $id)
        ->first();
        return response()->json($data);
    }
}
