<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable=[
        'name','image','lyrics','mp3','artiste_id'
    ];

    public function artiste(){
        return $this->belongsTo(Artiste::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class);
    }

    public function isfavorited()
    {
        return $this->favorites()->where('user_id',auth()->id())->count()>0;
    }

    // public function getIsFavoritedAttribute()
    // {
    //     return $this->isfavorited();
    // }
}
