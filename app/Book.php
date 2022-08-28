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
        'book_statu_id',
        'name',
        'age',
        'description',
        'image',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
