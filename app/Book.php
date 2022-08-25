<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'age',
        'description',
        'image',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
