<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menzil_sah_Model extends Model
{
    use HasFactory;
    protected $fillable = [
        'kopmleks',
        'bina',
        'menzil',
        'name',
       
    ];

    public function getKompleks()
    {
        return $this->hasOne('App\Models\KompleksModel', 'id', 'kompleks');
    }

    public function getBina()
    {
        return $this->hasOne('App\Models\BinaModel', 'id', 'bina');
    }
    public function getMenzil()
    {
        return $this->hasOne('App\Models\MenzilModel', 'id', 'menzil');
    }
}
