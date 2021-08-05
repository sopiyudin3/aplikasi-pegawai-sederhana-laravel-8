<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Absensi;
use App\Models\Pegawai;
use Illuminate\Pagination\Paginator;
use Dompdf\Dompdf;


class AbsensiController extends Controller
{
    public function absensi()
    {
		$dataAbsensi = Absensi::with('pegawai')->paginate(3);
		return view('absensi.absensi',compact('dataAbsensi'));
	}
	
	public function cetak_pdf()
    {
		$dataAbsensi = Absensi::with('pegawai')->get();
		return view('absensi.absensi_pdf', compact('dataAbsensi'));
    }
	
    public function cari(Request $request)
    {
		// mengambil data dari table absensi
		$cari = $request->cari;
		$dataAbsensi = DB::table('absensi')
			->where('id', 'like', "%".$cari. "%")
			->paginate();
		return view('absensi.absensi',compact('dataAbsensi'));
	}
	
	// method untuk menampilkan view form tambah absensi
	public function tambah()
	{
		$pegawais = Pegawai::all();
		return view('absensi.tambah', compact('pegawais'));
		

	}
	
	// method untuk insert data ke table absensi
	public function store(Request $request)
	{
		// insert data ke table absensi
		DB::table('absensi')->insert([
			'pegawai_id' => $request->pegawai_id,
			'ketidakhadiran_perhari' => $request->ketidakhadiran_perhari,
			'potongan_transport_perhari' => $request->potongan_transport_perhari
		]);
		// alihkan halaman ke halaman absensi
		return redirect('/absensi');

	}
	
	public function edit($pegawai_id)
	{
		
		//$absen = Absensi::findorfail($id);
		//return view('absensi.edit', compact('absen'));
		//$tambahKetidakhadiran = Form::selectRange('number', 10, 20);
		//dd($tambahKetidakhadiran); die;
		$peg = Pegawai::all();
		$absen = Absensi::with('pegawai')->findorfail($pegawai_id);
		return view('absensi.edit', compact('peg', 'absen'));
	 
	}
	
	// update data absensi
	public function update(Request $request)
	{
		// update data absensi
		DB::table('absensi')->where('id',$request->id)->update([
			'ketidakhadiran_perhari' => $request->ketidakhadiran_perhari,
			'potongan_transport_perhari' => $request->potongan_transport_perhari
		]);
		// alihkan halaman ke halaman absensi
		return redirect('/absensi');
	}
	
	// method untuk hapus data absensi
	public function hapus($id)
	{
		// menghapus data absensi berdasarkan id yang dipilih
		DB::table('absensi')->where('id',$id)->delete();
			
		// alihkan halaman ke halaman absensi
		return redirect('/absensi');
	}
}
