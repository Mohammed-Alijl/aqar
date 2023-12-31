<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable = [
      'name'
    ];

    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function values(){
        return $this->hasMany(AttributeValue::class);
    }

    public function aqars(){
        return $this->belongsToMany(Aqar::class, 'attribute_aqar');
    }
}
