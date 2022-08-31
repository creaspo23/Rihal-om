<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];


    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
