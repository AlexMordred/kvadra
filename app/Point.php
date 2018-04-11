<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
        'category_id',
        'lat',
        'long',
    ];

    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
