<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        $obats = Obat::all(); // Get all obat data for non-admin users
        return view('dashboard', compact('obats'));
    }
}
