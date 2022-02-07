<?php

namespace App\Http\Controllers;


use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManufacturerController extends Controller
{
    public function index(Request $request) {
        $user = auth()->user();
        $data = Manufacturer::where('store_id', $user->store_id)
        ->where('status', 'active')
        ->get();
        return response()->json($data);
    }
}
