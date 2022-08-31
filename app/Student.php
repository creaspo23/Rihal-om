<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    protected $with = ['classe','country'];

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classes::class,'classe_id');
    }
}
