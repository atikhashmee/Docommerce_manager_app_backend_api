<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request) {
        $user = auth()->user();
        $data = Supplier::where('store_id', $user->store_id)
        ->where('status', 'active')
        ->where('type', 'vendor')
        ->get();
        return response()->json($data);
    }
}
