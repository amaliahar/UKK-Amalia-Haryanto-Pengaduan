<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduans extends Model
{
    use HasFactory;
    protected $table = 'pengaduans';
    protected $primaryKey = 'id_pengaduans';
    protected $guarded = [];
}
