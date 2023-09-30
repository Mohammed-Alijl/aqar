<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'zone_id'
    ];

    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function zone(){
        return $this->belongsTo(Zone::class);
    }

    public function aqars(){
        return $this->hasMany(Aqar::class);
    }
}
