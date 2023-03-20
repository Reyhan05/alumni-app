<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_kelamin extends Model
{
    protected $guarded = [''];
    protected $table = 'jenis_kelamin';
    use HasFactory;

    public function jenkel() {
        return $this->belongsTo('App\Models\Students', 'id_gender', 'id');
    }
}
