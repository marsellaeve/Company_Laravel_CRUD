<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'film';
    protected $fillable = ['title','release_date','genre','duration','rated','rating','poster'];

    public function getPoster()
    {
        if(!$this->poster){
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->poster);
    }
}
