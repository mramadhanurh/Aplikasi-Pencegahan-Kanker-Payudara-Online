<?php

namespace App\Http\Controllers;

use App\Models\Usia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = [
            'subjudul' => 'Usia',
            'submenu' => 'usia',
        ];
        return view('usia.index', compact('judul'));
    }

    public function fetchusia()
    {
        $usia = Usia::all();
        return response()->json([
            'usia'=>$usia,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usia'=>'required',
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
            $usia = new Usia;
            $usia->usia = $request->input('usia');
            $usia->skor = $request->input('skor');
            $usia->save();
            return response()->json([
                'status'=>200,
                'message'=>'Usia berhasil ditambahkan'
            ]);
        }
    }

    public function edit($id)
    {
        $usia = Usia::find($id);
        if($usia)
        {
            return response()->json([
                'status'=>200,
                'usia'=>$usia,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Usia Not Found'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'usia'=>'required',
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
            $usia = Usia::find($id);
            if($usia)
            {
                $usia->usia = $request->input('usia');
                $usia->skor = $request->input('skor');
                $usia->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Usia berhasil diupdate'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Usia Not Found'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $usia = Usia::find($id);
        $usia->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Usia berhasil dihapus'
        ]);
    }
}
