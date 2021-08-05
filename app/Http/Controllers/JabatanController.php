<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Pagination\Paginator;


class JabatanController extends Controller
{
    public function jabatan()
    {
		$dataJabatan = Jabatan::paginate(3);
		return view('jabatan.jabatan',compact('dataJabatan'));
	}
	
    public function cari(Request $request)
    {
		// mengambil data dari table jabatan
		$cari = $request->cari;
		$dataJabatan = DB::table('jabatan')
			->where('nama_jabatan', 'like', "%".$cari. "%")
			->paginate();
		return view('jabatan.jabatan',compact('dataJabatan'));
	}
	
	// method untuk menampilkan view form tambah jabatan
	public function tambah()
	{
		// memanggil view tambah
		$jabatans = Jabatan::all();
		return view('jabatan.tambah', compact('jabatans'));

	}
	
	// method untuk insert data ke table jabatan
	public function store(Request $request)
	{
		// insert data ke table jabatan
		DB::table('jabatan')->insert([
			'nama_jabatan' => $request->nama_jabatan
		]);
		// alihkan halaman ke halaman jabatan
		return redirect('/jabatan');

	}
	
	public function edit($id)
	{
		// mengambil data jabatan berdasarkan id yang dipilih
		//$jab = Jabatan::all();
		$jab = Jabatan::findorfail($id);
		return view('jabatan.edit', compact('jab'));
	 
	}
	
	// update data jabatan
	public function update(Request $request)
	{
		// update data jabatan
		DB::table('jabatan')->where('id',$request->id)->update([
			'nama_jabatan' => $request->nama_jabatan
		]);
		// alihkan halaman ke halaman jabatan
		return redirect('/jabatan');
	}
	
	// method untuk hapus data jabatan
	public function hapus($id)
	{
		// menghapus data jabatan berdasarkan id yang dipilih
		DB::table('jabatan')->where('id',$id)->delete();
			
		// alihkan halaman ke halaman jabatan
		return redirect('/jabatan');
	}
}
