<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = [
            'subjudul' => 'Pertanyaan',
            'submenu' => 'pertanyaan',
        ];
        return view('pertanyaan.index', compact('judul'));
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

    public function fetchpertanyaan()
    {
        $pertanyaan = Pertanyaan::all();
        return response()->json([
            'pertanyaan'=>$pertanyaan,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pertanyaan'=>'required',
            'pilihan'=>'required',
            'skor'=>'required',
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
            $pertanyaan = new Pertanyaan;
            $pertanyaan->pertanyaan = $request->input('pertanyaan');
            $pertanyaan->pilihan = $request->input('pilihan');
            $pertanyaan->skor = $request->input('skor');
            $pertanyaan->save();
            return response()->json([
                'status'=>200,
                'message'=>'Pertanyaan berhasil ditambahkan'
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
        $pertanyaan = Pertanyaan::find($id);
        if($pertanyaan)
        {
            return response()->json([
                'status'=>200,
                'pertanyaan'=>$pertanyaan,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Pertanyaan Not Found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pertanyaan'=>'required',
            'pilihan'=>'required',
            'skor'=>'required',
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
            $pertanyaan = Pertanyaan::find($id);
            if($pertanyaan)
            {
                $pertanyaan->pertanyaan = $request->input('pertanyaan');
                $pertanyaan->pilihan = $request->input('pilihan');
                $pertanyaan->skor = $request->input('skor');
                $pertanyaan->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Pertanyaan berhasil diupdate'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Pertanyaan Not Found'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Pertanyaan berhasil dihapus'
        ]);
    }
}
