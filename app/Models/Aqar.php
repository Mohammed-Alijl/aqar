<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aqar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'latitude',
        'longitude',
        'city_id',
        'category_id',
        'price',
        'watches',
        'whatsapp_number',
        'mobile_number',
        'email'
    ];


    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function attachments()
    {
        return $this->hasMany(AqarAttachment::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_aqar');
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'attribute_value_aqar');
    }

    public function related()
    {
        return $this->belongsToMany(Aqar::class, 'related_aqar','related_aqar_id');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
