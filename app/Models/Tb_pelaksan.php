<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tb_pelaksan extends Model
{
    use HasFactory;
    protected $table        = "tb_pelaksans";
    protected $primarykey   = "id_pelaksana_kegiatan";
    protected $fillable     = [ 'nama_pelaksana'];
}
