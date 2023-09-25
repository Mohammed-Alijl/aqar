<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'attribute_id'
    ];

    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }

    public function aqars(){
        return $this->belongsToMany(Aqar::class, 'attribute_aqar');
    }
}
