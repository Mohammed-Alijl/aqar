<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    protected static function booted()
    {
        static::creating(function ($aqar) {
            $aqar->slug = static::generateUniqueSlug($aqar->title);
        });
    }

    public static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = Str::slug($title) . '-' . $count;
            $count++;
        }

        return $slug;
    }


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
