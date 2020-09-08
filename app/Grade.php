<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';
    public function kids()
    {
        return $this->hasMany(Kid::class, 'grade_id');
    }
}
