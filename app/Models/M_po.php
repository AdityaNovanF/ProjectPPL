<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_po extends Model
{
    protected $table = 'm_po';

    public function pupuk_r()
    {
        return $this->belongsTo('App\Models\M_pupuk', 'pupuk', 'id');
    }
}
