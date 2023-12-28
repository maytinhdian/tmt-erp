<?php

namespace Modules\Product\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * Trong Laravel, $fillablethuộc tính được sử dụng để chỉ định những trường có thể gán hàng loạt. $guardedthuộc tính được sử dụng để chỉ định những trường sẽ được đặt ở dạng không thể gán hàng loạt.

     * $fillableđóng vai trò như một "danh sách trắng" gồm các thuộc tính có thể gán hàng loạt và $guardedhoạt động ngược lại với nó như một "danh sách đen" gồm các thuộc tính không thể gán hàng loạt.

     * Nếu chúng ta muốn chặn tất cả các trường không bị gán hàng loạt, chúng ta có thể sử dụng:

     * protected $guarded = ['*'];

     * Nếu chúng ta muốn làm cho tất cả các trường có thể được gán hàng loạt, chúng ta có thể sử dụng:

     * protected $guarded = [];

     * Nếu chúng ta muốn gán khối lượng trường cụ thể, chúng ta có thể sử dụng:

     * protected $fillable = ['fieldName'];

     * Cuối cùng, nếu chúng ta muốn chặn một trường cụ thể không được gán hàng loạt, chúng ta có thể sử dụng:

     * protected $guarded = ['fieldName'];
     */

    protected $guarded = [];
    
    public function categories_id(): HasMany
    {
        return $this->hasMany(Category::class);
    }
    protected static function newFactory()
    {
        //return ProductFactory::new();
    }
}
