<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Pagination\Paginator;
use Dompdf\Dompdf;


class PegawaiController extends Controller
{
    public function pegawai()
    {
		// mengambil data dari table pegawai + relasinya dengan jabatan
		$dataPegawai = Pegawai::with('jabatan')->paginate(3);
		return view('pegawai.pegawai',compact('dataPegawai'));
		//print_r($dataPegawai);
	}
	
	public function cetak_pdf()
    {
		$dataPegawai = Pegawai::with('jabatan')->get();
		return view('pegawai.pegawai_pdf', compact('dataPegawai'));
    }
	
    public function cari(Request $request)
    {
		// mengambil data dari table pegawai + relasinya dengan jabatan
		$cari = $request->cari;
		//$dataPegawai = DB::table('pegawai')
		$dataPegawai = Pegawai::with('jabatan')
			->where('nama', 'like', "%".$cari. "%")
			->paginate();
		//return view('pegawai.pegawai',compact('dataPegawai'));
		return view('pegawai.pegawai',['dataPegawai' => $dataPegawai]);
	}
	
	// method untuk menampilkan view form tambah pegawai
	public function tambah()
	{
		// memanggil view tambah
		$jabatans = Jabatan::all();
		return view('pegawai.tambah', compact('jabatans'));

	}
	
	// method untuk insert data ke table pegawai
	
	public function proses_upload(Request $request){
 
		$file = $request->file('image');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'foto_pegawai';
		$file->move($tujuan_upload, $nama_file);
		Pegawai::create([
			'image' => $nama_file,
			'nama' => $request->nama,
			'alamat_rumah' => $request->alamat_rumah,
			'alamat_kantor' => $request->alamat_kantor,
			'umur' => $request->umur,
			'jabatan_id' => $request->jabatan_id
		]);
		return redirect()->back();
		
	}
	
	public function store(Request $request)
	{
		// insert data ke table pegawai
		DB::table('pegawai')->insert([
			'nama' => $request->nama,
			'alamat_rumah' => $request->alamat_rumah,
			'alamat_kantor' => $request->alamat_kantor,
			'umur' => $request->umur,
			'jabatan_id' => $request->jabatan_id
		]);
		// alihkan halaman ke halaman pegawai
		return redirect('/pegawai');

	}
	
	public function edit($id)
	{
		// mengambil data pegawai berdasarkan id yang dipilih
		$jab = Jabatan::all();
		$peg = Pegawai::with('jabatan')->findorfail($id);
		return view('pegawai.edit', compact('peg', 'jab'));
	 
	}
	
	// update data pegawai
	public function update(Request $request)
	{
		// update data pegawai
		
		$file = $request->file('image');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'foto_pegawai';
		$file->move($tujuan_upload, $nama_file);
		
		DB::table('pegawai')->where('id',$request->id)->update([
			'image' => $nama_file,
			'nama' => $request->nama,
			'alamat_rumah' => $request->alamat_rumah,
			'alamat_kantor' => $request->alamat_kantor,
			'umur' => $request->umur,
			'jabatan_id' => $request->jabatan_id
		]);
		
		// alihkan halaman ke halaman pegawai
		return redirect('/pegawai');
	}
	
	// method untuk hapus data pegawai
	public function hapus($id)
	{
		// menghapus data pegawai berdasarkan id yang dipilih
		DB::table('pegawai')->where('id',$id)->delete();
			
		// alihkan halaman ke halaman pegawai
		return redirect('/pegawai');
	}
}
