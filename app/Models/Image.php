<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Image extends Model
{
    protected $fillable = ['path'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_images');
    }


}
