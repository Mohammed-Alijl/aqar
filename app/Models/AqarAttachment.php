<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AqarAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
      'aqar_id',
      'path',
    ];

    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function aqar(){
        return $this->belongsTo(Aqar::class);
    }
}
