<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class jadwal_kegiatan extends Model
{
    use HasFactory;
    protected $table        = "jadwal_kegiatans";
    protected $primarykey   = "id_kegiatan";
    protected $fillable     = [ 'rencanakerja', 'hari', 'id_pelaksana','waktu', 'foto'];

    static function getJadwal(){
        $return=DB::table('jadwal_kegiatans')
        ->join('tb_pelaksans','jadwal_kegiatans.id_pelaksana','=','tb_pelaksans.id_pelaksana_kegiatan');
        return $return;
    }
}




