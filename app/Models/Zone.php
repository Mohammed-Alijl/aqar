<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country_id'
    ];

    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
