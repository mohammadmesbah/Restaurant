<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable= 
    [
        'phone','date','user_id','time','meal_id',
        'qty','address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}
