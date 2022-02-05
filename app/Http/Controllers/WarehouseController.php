<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index(Request $request) {
        $user = auth()->user();
        $data = Warehouse::where('store_id', $user->store_id)
        ->where('status', 'active')
        ->get();
        return response()->json($data);
    }


    public function show($id) {
        $user = auth()->user();
        $data = Warehouse::where('store_id', $user->store_id)
        ->where('status', 'active')
        ->where('id', $id)
        ->first();
        return response()->json($data);
    }
}
