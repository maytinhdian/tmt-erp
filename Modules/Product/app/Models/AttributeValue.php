<?php

namespace Modules\Product\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\AttributeValueFactory;

class AttributeValue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name'];

    protected static function newFactory()
    {
        //return AttributeValueFactory::new();
    }
    public function attribute_id(): HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function product_id(): HasMany{
        return $this->hasMany(Product::class);
    }
}
