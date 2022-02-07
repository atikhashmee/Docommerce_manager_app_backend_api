<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
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
}
