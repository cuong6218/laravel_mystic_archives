<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_type', 'type_id', 'book_id');
    }
}
