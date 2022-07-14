<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $with = ['variations'];
    protected $fillable = [
        'name',
        'category_id',
        'is_active',
    ];


    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
}
