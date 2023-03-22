<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $guarded = [''];
    protected $table = 'students';
    use HasFactory;

    // relasi one to many
    public function jenkels() {
        // laravel versi ke 7 ke atas
        return $this->hasMany(jenis_kelamin::class, 'id', 'id_gender');
    }

    // relasi one to one
    public function bios() {
        // laravel versi ke 7 ke atas
        return $this->hasOne(Bios::class, 'id', 'id_biodata');
    }
}
