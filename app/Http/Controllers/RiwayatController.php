<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = [
            'subjudul' => 'Riwayat',
            'submenu' => 'riwayat',
        ];
        return view('riwayat.index', compact('judul'));
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

    public function fetchriwayat()
    {
        $riwayat = Riwayat::all();
        return response()->json([
            'riwayat'=>$riwayat,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'riwayat'=>'required',
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
            $riwayat = new Riwayat;
            $riwayat->riwayat = $request->input('riwayat');
            $riwayat->skor = $request->input('skor');
            $riwayat->save();
            return response()->json([
                'status'=>200,
                'message'=>'Riwayat berhasil ditambahkan'
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
        $riwayat = Riwayat::find($id);
        if($riwayat)
        {
            return response()->json([
                'status'=>200,
                'riwayat'=>$riwayat,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Riwayat Not Found'
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
            'riwayat'=>'required',
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
            $riwayat = Riwayat::find($id);
            if($riwayat)
            {
                $riwayat->riwayat = $request->input('riwayat');
                $riwayat->skor = $request->input('skor');
                $riwayat->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Riwayat berhasil diupdate'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Riwayat Not Found'
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
        $riwayat = Riwayat::find($id);
        $riwayat->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Riwayat berhasil dihapus'
        ]);
    }
}
