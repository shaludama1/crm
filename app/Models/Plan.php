<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    
}
