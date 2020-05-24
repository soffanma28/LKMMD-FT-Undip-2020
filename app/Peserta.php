<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Peserta extends Model
{
    // use Searchable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imageurl', 'nama', 'panggilan', 'nim', 'email', 'alamat_kost', 'kbk', 'kelompok', 'jurusan', 'delegasi', 'asal', 'jenis_kelamin', 'agama', 'tempat_lahir','tanggal_lahir', 'hobi', 'motto', 'bio', 'github', 'linkedin', 'instagram', 'whatsapp', 'line', 'twitter',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'tanggal_lahir',
    ];


}
