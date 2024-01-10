<?php

namespace Modules\Product\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\AttributeValueFactory;

class ProductAttributeValue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['product_id','product_attribute_id','attribute_id','value'];

    protected static function newFactory()
    {
        //return AttributeValueFactory::new();
    }
    public function product_attribute_id(): HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function product_id(): HasMany{
        return $this->hasMany(Product::class);
    }
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_id = auth()->user()->id;
        });
    }
}
