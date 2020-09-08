<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    protected $table = 'kids';
    protected $fillable = [
        'name', 'age', 'phone', 'address', 'grade_id'
    ];
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
