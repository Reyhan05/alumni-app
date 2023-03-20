<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $guarded = [''];
    protected $table = 'students';
    use HasFactory;

    public function jenkels() {
        // laravel versi ke 7 ke atas
        return $this->belongsTo(jenis_kelamin::class, 'id', 'id_gender');

        // laravel versi ke 5 ke bawah
        // return $this->hasMany('app\Models\jenis_kelamin', 'id', 'jenkel');
    }
}
