<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinaModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'kopmleks',
        'bina',
       
    ];

    public function getKompleks()
    {
        return $this->hasOne('App\Models\KompleksModel', 'id', 'kompleks');
    }
}
