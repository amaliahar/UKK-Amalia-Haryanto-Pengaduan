<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Model
{
    use HasFactory;
    protected $table = 'masyarakat';
    protected $fillable = [
        'nik',
        'nama',
        'username',
        'password',
        'telp',
    ];
}
