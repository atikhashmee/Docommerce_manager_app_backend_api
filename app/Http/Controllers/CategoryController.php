<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $user = auth()->user();
        $data = Category::with(['nested' => function ($q) {
            $q->with(['nested' => function ($q) {
                $q->where('status', 1)
                    ->withCount('mainCatProducts');
            }])->withCount('mainCatProducts')
                ->where('status', 1);
        }])
        ->whereNull('parent_id')
        ->withCount('mainCatProducts')
        ->where('status', 1)
        ->where('store_id', $user->store_id)
        ->get();
        return response()->json($data);
    }


    public function show($id) {
        $user = auth()->user();
        $data = Category::with(['nested' => function ($q) {
            $q->with(['nested' => function ($q) {
                $q->where('status', 1)
                    ->withCount('mainCatProducts');
            }])->withCount('mainCatProducts')
                ->where('status', 1);
        }])
        ->whereNull('parent_id')
        ->withCount('mainCatProducts')
        ->where('status', 1)
        ->where('store_id', $user->store_id)
        ->where('id', $id)
        ->first();
        return response()->json($data);
    }
}
