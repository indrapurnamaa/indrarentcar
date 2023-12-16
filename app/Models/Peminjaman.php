<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_mulai',
        'tgl_selesai',
    ];
    protected $table = 'peminjaman';

    public function pengguna()
    {
        return $this->belongsTo(User::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
