<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'budget',
    ];

    public function shops()
    {
        return $this->belongsToMany('App\Models\Shop');
    }

    public function plans()
    {
        return $this->belongsToMany('App\Models\Plan');
    }

}
