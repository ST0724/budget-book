<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'date',
        'price'
    ];

   public function category()
   {
       return $this->belongsTo(Category::class);
   }
}
