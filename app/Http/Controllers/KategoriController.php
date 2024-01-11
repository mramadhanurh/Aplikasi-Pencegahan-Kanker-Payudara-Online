<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = [
            'subjudul' => 'Kategori',
            'submenu' => 'kategori',
        ];
        return view('kategori.index', compact('judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function fetchkategori()
    {
        $kategori = Kategori::all();
        return response()->json([
            'kategori'=>$kategori,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else
        {
            $kategori = new Kategori;
            $kategori->kategori = $request->input('kategori');
            $kategori->save();
            return response()->json([
                'status'=>200,
                'message'=>'Kategori berhasil ditambahkan'
            ]);
        }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        if($kategori)
        {
            return response()->json([
                'status'=>200,
                'kategori'=>$kategori,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Kategori Not Found'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kategori'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else
        {
            $kategori = Kategori::find($id);
            if($kategori)
            {
                $kategori->kategori = $request->input('kategori');
                $kategori->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Kategori berhasil diupdate'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Kategori Not Found'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Kategori berhasil dihapus'
        ]);
    }
}
