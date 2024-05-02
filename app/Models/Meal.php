<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable= 
    [
        'category',
        'name',
        'description',
        'price',
        'image'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
