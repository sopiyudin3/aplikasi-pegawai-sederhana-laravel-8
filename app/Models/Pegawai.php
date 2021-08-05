<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jabatan;
use App\Models\Absensi;

class Pegawai extends Model
{
	protected $table = 'pegawai';
	protected $primaryKey = 'id';
	protected $fillable = [
	'id', 'image', 'nama', 'alamat_rumah', 'alamat_kantor', 'umur', 'jabatan_id',];
	
	public function jabatan(){
    	return $this->belongsTo(Jabatan::class);
    }
	
	public function absensi(){
    	return $this->belongsTo(Absensi::class);
    }
	
	public function gaji(){
    	return $this->hasMany(Gaji::class);
    }
	
}
