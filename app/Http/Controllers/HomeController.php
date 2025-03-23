<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Measurement;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        return view('menu.home');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengirim data.');
        }

        $request->validate([
            'age' => 'required|integer|min:1',
            'gender' => 'required',
            'sistolik' => 'required',
            'diastolik' => 'required',
            'bpm' => 'required',
        ]);

        try {
            Measurement::create([
                'age' => $request->input('age'),
                'gender' => $request->input('gender'),
                'sistolik' => $request->input('sistolik'),
                'diastolik' => $request->input('diastolik'),
                'bpm' => $request->input('bpm'),
                'user_id' => Auth::id(),
            ]);

            return redirect()->route('pengukuran')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->route('pengukuran')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

}