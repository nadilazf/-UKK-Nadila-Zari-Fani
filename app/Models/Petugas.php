<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
class Petugas extends Model
{
    use HasFactory;
    protected $guard = 'petugas';
    protected $table = 'petugas';
    protected $fillable = ['nama', 'username', 'password', 'telp', 'level'];
}
