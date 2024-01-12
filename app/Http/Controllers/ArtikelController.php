<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{

    public function index()
    {
        $artikel = Artikel::all();
        $judul = [
            'subjudul' => 'Artikel',
            'submenu' => 'artikel',
        ];
        return view('artikel.index', compact('artikel', 'judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = [
            'subjudul' => 'Artikel',
            'submenu' => 'artikel',
        ];
        return view('artikel.create', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artikel = new Artikel;
        $artikel->judul = $request->input('judul');
        $artikel->deskripsi = $request->input('deskripsi');
        if($request->hasfile('gambar'))
        {
            $file = $request->file('gambar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('gambar_artikel/', $filename);
            $artikel->gambar = $filename;
        }
        $artikel->save();
        return redirect()->back()->with('status', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $artikel = Artikel::find($id);
        $judul = [
            'subjudul' => 'Artikel',
            'submenu' => 'artikel',
        ];
        return view('artikel.edit', compact('judul', 'artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::find($id);
        $artikel->judul = $request->input('judul');
        $artikel->deskripsi = $request->input('deskripsi');

        if($request->hasfile('gambar'))
        {
            $destination = 'gambar_artikel/'.$artikel->gambar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('gambar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('gambar_artikel/', $filename);
            $artikel->gambar = $filename;
        }

        $artikel->update();
        return redirect()->back()->with('status', 'Artikel berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        $destination = 'gambar_artikel/'.$artikel->gambar;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $artikel->delete();
        return redirect()->back()->with('status_delete', 'Artikel berhasil dihapus');
    }
}
