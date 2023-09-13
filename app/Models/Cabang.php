<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cabang extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = 'cabang';
    protected $primaryKey = 'id_cabang';
    protected $fillable = [
        'id_perusahaan', 'alamat',
        'kode_cabang', 'nama_cabang', 'penanggung_jawab'
    ];
    public $timestamps = false;
}
