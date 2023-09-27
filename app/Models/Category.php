<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'display_main',
      'display_order',
    ];

    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function aqars(){
        return $this->hasMany(Aqar::class);
    }
}
