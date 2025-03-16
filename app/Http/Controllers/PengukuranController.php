<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Measurement;
use Illuminate\Support\Facades\Auth;

class PengukuranController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Cek apakah user memiliki pengukuran terbaru
        $measurement = Measurement::where('user_id', Auth::id())->latest()->first();

        // Jika tidak ada pengukuran, isi dengan tanda "-"
        if (!$measurement) {
            $measurement = (object) [
                'sistolik' => '-',
                'diastolik' => '-',
                'bpm' => '-',
                'age' => '-',
                'gender' => '-'
            ];
        }

        return view('menu.pengukuran', compact('measurement'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sistolik' => 'required|integer',
            'diastolik' => 'required|integer',
            'bpm' => 'required|integer',
        ]);

        Measurement::create([
            'user_id' => Auth::id(),
            'sistolik' => $request->sistolik,
            'diastolik' => $request->diastolik,
            'bpm' => $request->bpm,
        ]);

        // Arahkan ke halaman pengukuran setelah input data
        return redirect()->route('pengukuran.index')->with('success', 'Data pengukuran berhasil disimpan.');
    }
}
