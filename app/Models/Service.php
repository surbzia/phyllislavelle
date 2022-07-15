<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $with = ['variation', 'category'];
    protected $appends = ['category_name'];
    protected $fillable = [
        'name',
        'category_id',
        'is_active',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function variation()
    {
        return $this->hasMany(Variation::class);
    }
    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($service) {
            $service->variation()->delete();
        });
    }
}
