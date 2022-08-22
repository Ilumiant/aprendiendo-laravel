<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
    "name",
    "price",
    "description",
    "user_id",
    'image'
  ];

  /**
   * Get the user that owns the Product
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function createdAt()
  {
    return $this->created_at->format('d/m/Y');
  }

  public function updatedAt()
  {
    return $this->updated_at->format('d/m/Y');
  }
}
