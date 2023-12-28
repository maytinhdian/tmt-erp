<?php

namespace Modules\Product\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Product\Database\factories\ProductFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name','slug','price','categories_id'];
    public function categories_id(): HasMany{
        return $this->hasMany(Category::class);
    }
    protected static function newFactory()
    {
        //return ProductFactory::new();
    }
}
