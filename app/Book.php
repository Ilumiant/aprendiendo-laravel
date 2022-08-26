<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Book extends Model
{
    use SoftDeletes;
    use Userstamps;

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
