<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    use HasFactory;
    protected $table = 'tbl_akun';
    protected $primaryKey = 'id_akun';
    protected $fillable = ['username', 'password', 'role'];
    protected $timestamps = false;
}
