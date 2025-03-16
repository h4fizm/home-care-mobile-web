<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Measurement;

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil data pengukuran berdasarkan user yang login
        $measurements = Measurement::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('menu.riwayat', compact('measurements'));
    }
}
