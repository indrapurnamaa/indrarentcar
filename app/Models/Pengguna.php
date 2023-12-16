<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'nama',
        'alamat',
        'no_telepon',
        'no_sim',
    ];
    protected $table = 'pengguna';

}
