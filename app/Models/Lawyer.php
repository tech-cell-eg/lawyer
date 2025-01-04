<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    use HasFactory;

    protected $fillable= [
        "image_link",
        "name",
        "biography",
        "city_id",
        "experience_years",
        "hour_price"
    ];

    function languages() {
        return $this->belongsToMany(Language::class, "lawyer_language");
    }

    function area_of_practice() {
        return $this->belongsToMany(Category::class, "category_lawyer");
    }

    function reviews() {
        return $this->hasMany(Review::class);
    }
}
