<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
//use App\Models\Jabatan;
use Illuminate\Pagination\Paginator;
use Hash;


class UserController extends Controller
{
    public function user()
    {
		$dataUser = User::paginate(3);
		return view('user.user',compact('dataUser'));
	}
	
    public function cari(Request $request)
    {
		// mengambil data dari table user
		$cari = $request->cari;
		$dataUser = DB::table('users')
			->where('name', 'like', "%".$cari. "%")
			->paginate();
		return view('user.user',compact('dataUser'));
	}
	
	// method untuk menampilkan view form tambah user
	public function tambah()
	{
		// memanggil view tambah
		$users = User::all();
		return view('user.tambah', compact('users'));

	}
	
	// method untuk insert data ke table user
	public function store(Request $request)
	{
		// insert data ke table user
		DB::table('users')->insert([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password)
			
			//$user->password = Hash::make($request->password);
			
		]);
		// alihkan halaman ke halaman user
		return redirect('/user');

	}
	
	public function edit($id)
	{
		$usr = User::findorfail($id);
		return view('user.edit', compact('usr'));
	 
	}
	
	// update data user
	public function update(Request $request)
	{
		// update data user
		DB::table('users')->where('id',$request->id)->update([
			'name' => $request->name,
			'email' => $request->email,
			'password' => $request->password,
			'password' => Hash::make($request->password)
			
		]);
		// alihkan halaman ke halaman user
		return redirect('/user');
	}
	
	// method untuk hapus data user
	public function hapus($id)
	{
		// menghapus data user berdasarkan id yang dipilih
		DB::table('users')->where('id',$id)->delete();
			
		// alihkan halaman ke halaman user
		return redirect('/user');
	}
}
