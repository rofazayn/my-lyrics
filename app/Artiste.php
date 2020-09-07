<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{
    protected $fillable=[
        'name','image','category_id'
    ];

    public function songs(){
        return $this->hasMany(Song::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
