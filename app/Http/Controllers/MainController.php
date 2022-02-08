<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\LocalShipping;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index() {
        return 'dd';
    }
    public function getCountries() {
        $data = Country::get();
        return response()->json($data);
    }

    public function getLocalShipping() {
        $user = auth()->user();
        $localshipping = LocalShipping::with('carrier')
        ->where(function ($q) use($user) {
            if (in_array($user->type, ['merchant', 'merchant_staff'])) {
                $admin = null;
            } else {
                if ($user->admin_id) {
                    $admin = $user->admin->delivery_manage ? $user->admin_id : null;
                } else {
                    $admin = $user->delivery_manage ? $user->id : null;
                }
            }
            $q->where('admin_id', $admin);
        })
        ->where('store_id', $user->store_id)
        ->where('status', 'active')
        ->get();
        return response()->json($localshipping);
    }
}
