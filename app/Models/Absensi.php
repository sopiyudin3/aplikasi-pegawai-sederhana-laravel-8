<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Absensi;
use App\Models\Pegawai;

class Absensi extends Model
{
	protected $table = 'absensi';
	protected $primaryKey = 'id';
	protected $fillable = ['id', 'jumlah_hari_kerja', 'jumlah_hari_sakit', 'jumlah_hari_izin',
	'jumlah_hari_alfa', 'jumlah_hari_cuti', 'potongan_gaji_pokok', 'potongan_tunjangan_makan',
	'potongan_tunjangan_transport'];
	
	public function gaji(){
    	return $this->hasMany(Gaji::class);
    }
	
	public function pegawai(){
    	return $this->belongsTo(Pegawai::class);
    }
}
