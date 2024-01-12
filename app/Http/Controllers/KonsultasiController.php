<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\Usia;
use App\Models\Riwayat;
use App\Models\Konsultasi;

class KonsultasiController extends Controller
{
    public function index(){
    	$pertanyaan = Pertanyaan::select('pertanyaan')->distinct()->get();

    	$usia = Usia::all();
    	$riwayat = Riwayat::all();
    	$bkg = [];
    	$opsi = [];
    	foreach ($usia as $item){
    		$opsi[] = ['id' => $item->id, 'pilihan' => $item->usia, 'skor' => $item->skor];
    	}
    	$bkg[] = ['pertanyaan' => 'Berapa rentang usia Anda?', 
    				'pilihan' => $opsi
    			, 'urut'=>1];
    	$opsi = [];

    	foreach ($riwayat as $item){
    		$opsi[] = ['id' => $item->id, 'pilihan' => $item->riwayat, 'skor' => $item->skor];
    	}
    	$bkg[] = ['pertanyaan' => 'Bagaimana riwayat keluarga dengan kanker?', 
    				'pilihan' => $opsi, 'urut'=>2];
    	$questions = [];
    	$c = 3;
    	foreach ($pertanyaan as $p){
    		$opsi = Pertanyaan::where('pertanyaan', $p->pertanyaan)->get();
    		$pilihan = [];
    		foreach ($opsi as $item){
    			$pilihan[] = ['id'=>$item->id, 'pilihan' => $item->pilihan, 'skor'=> $item->skor];
    		}
    		$questions[] = ['pertanyaan' => $p->pertanyaan, 'pilihan' =>$pilihan, 'urut' =>$c];
    		$c++;
    	}
    	$usia = Usia::all();
    	$riwayat = Riwayat::all();
    	// dd($pertanyaan);
    	return view('konsultasi', compact('questions', 'bkg'));
    }
    public function periksa(Request $request){

    	$konsul = new Konsultasi;
    	$konsul->total_skor_resiko = $request->input('calc1');
    	$konsul->total_skor_analisa = $request->input('calc2');
    	$konsul->nama = $request->input('nama');
    	$konsul->save();

    	return json_encode(['status' =>'sukses']);
    }
    public function daftarHasil(){
    	 $judul = [
            'subjudul' => 'Hasil',
            'submenu' => 'hasil',
        ];
        return view('konsultasi.index', compact('judul'));

    }

    public function fetchkonsultasi()
    {
        $hasil = Konsultasi::all();
        $result = [];
        foreach ($hasil as $item){
        	$temp['tanggal'] = date('d-m-Y', strtotime($item->created_at));
        	$resiko= (int)$item->total_skor_resiko;
        	$str = 'Rendah';
        	if($resiko > 4 && $resiko < 7){
        		$str = 'Sedang';
        	}else if($resiko >= 7){
        		$str = 'Tinggi';
        	}
        	$temp['resiko'] = $str;
        	$analisa = (int)$item->total_skor_analisa;

        	$temp['analisa'] = $analisa > 0? 'Mencurigakan' : 'Normal';
        	$temp['nama'] = $item->nama;
        	$result[] = $temp;

        				
        }
        return response()->json([
            'result'=>$result,
        ]);
    }
}
