<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    protected $fillable = ['user_id', 'nomor_str'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function rekamMedis() {
        return $this->hasMany(RekamMedis::class);
    }
}