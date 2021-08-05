<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gaji;
use App\Models\Pegawai;
use App\Models\Absensi;
use Illuminate\Pagination\Paginator;
use Dompdf\Dompdf;


class GajiController extends Controller
{
	
    public function gaji()
    {
		// mengambil data dari table pegawai + relasinya dengan jabatan
		$dataGaji = Gaji::with('pegawai', 'absensi')->paginate(3);
		
		//$c = Gaji::select('gaji.*')
        //->leftJoin('absensi', 'gaji.absensi_id', '=', 'absensi.id')
        //->whereNull('absensi.id')
		//->first();
		
		//dd($c); die;
		return view('gaji.gaji', compact('dataGaji'));
	}
	
	public function cetak_pdf()
    {
		$dataGaji = Gaji::with('pegawai')->get();
		return view('gaji.gaji_pdf', compact('dataGaji'));
    }
	
    public function cari(Request $request)
    {
		// mengambil data dari table pegawai + relasinya dengan jabatan
		$cari = $request->cari;
		$dataGaji = DB::table('gaji')
			->where('id', 'like', "%".$cari. "%")
			->paginate();
		//return view('pegawai.pegawai',compact('dataPegawai'));
		return view('gaji.gaji',['dataGaji' => $dataGaji]);
		
	}
	
	// method untuk menampilkan view form tambah gaji
	public function tambah()
	{
		
		$dataGaji = Gaji::all();
		$dataPegawai = Pegawai::all();
		return view('gaji.tambah', compact('dataPegawai', 'dataGaji'));

	}
	
	// method untuk insert data ke table pegawai
	public function store(Request $request)
	{
		// insert data ke table pegawai
		DB::table('gaji')->insert([
			'pegawai_id' => $request->pegawai_id,
			'gaji_pokok' => $request->gaji_pokok,
			'tunjangan_jabatan' => $request->tunjangan_jabatan,
			'kalkulasi_potongan' => $request->kalkulasi_potongan
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('/gaji');

	}
	
	public function edit($id)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$pegawai = Pegawai::all();
		$gaji = Gaji::with('pegawai')->findorfail($id);
		return view('gaji.edit', compact('gaji', 'pegawai'));
	 
	}
	
	// update data pegawai
	public function update(Request $request)
	{
		// update data pegawai
		DB::table('gaji')->where('id',$request->id)->update([
			'pegawai_id' => $request->pegawai_id,
			'gaji_pokok' => $request->gaji_pokok,
			'tunjangan_jabatan' => $request->tunjangan_jabatan,
			'kalkulasi_potongan' => $request->kalkulasi_potongan,
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('/gaji');
	}
	
	// method untuk hapus data pegawai
	public function hapus($id)
	{
		// menghapus data pegawai berdasarkan id yang dipilih
		DB::table('gaji')->where('id',$id)->delete();
			
		// alihkan halaman ke halaman pegawai
		return redirect('/gaji');
	}
}
