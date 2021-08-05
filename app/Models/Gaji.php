<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gaji;

class Gaji extends Model
{
	protected $table = 'gaji';
	protected $primaryKey = 'id';
	protected $fillable = [
	'id', 'pegawai_id', 'absensi_id', 'tanggal_penggajian', 'gaji_pokok', 'tunjangan_jabatan',
	'tunjangan_makan', 'tunjangan_transport'];
	
	public function pegawai(){
    	return $this->belongsTo(Pegawai::class);
    }
	
	public function absensi(){
    	return $this->belongsTo(Absensi::class);
    }
}
