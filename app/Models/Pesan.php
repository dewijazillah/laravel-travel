<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesan';
    protected $primaryKey = 'id_pesan';
    protected $fillable = ['id_pesan','id_user','email_pemesan','nama_paket','penginapan','jumlah_orang','transportasi','tanggal_berangkat','total_harga','status', 'soft_delete'];

    public function User()
    {
        return $this->hasOne(User::class, 'id_user', 'id_user');
    }    
}
