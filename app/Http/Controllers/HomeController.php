<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pertanyaan;
use App\Models\Riwayat;
use App\Models\Usia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usia = Usia::count();
        $riwayat = Riwayat::count();
        $pertanyaan = Pertanyaan::count();
        $kategori = Kategori::count();
        $judul = [
            'subjudul' => 'Dashboard',
            'submenu' => 'dashboard',
        ];
        return view('v_home', compact('judul', 'usia', 'riwayat', 'pertanyaan', 'kategori'));
    }
}
