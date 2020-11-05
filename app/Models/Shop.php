<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
    ];

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function plans()
    {
        return $this->hasMany('App\Models\Plan');
    }
}
