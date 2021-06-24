<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @property string $title
 * @property string $metaTitle
 * @property string $slug
 * @property int $type
 * @property float $price
 * @property float $discount
 * @property int $quantity
 * @property int $shop
 * @property string $conten
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereConten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUserId($value)
 * @property string $meta_title
 * @property string $content
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CartItem[] $cartItems
 * @property-read int|null $cart_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderItem[] $orderItems
 * @property-read int|null $order_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductMeta[] $productMetas
 * @property-read int|null $product_metas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductReview[] $productReviews
 * @property-read int|null $product_reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \App\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereContent($value)
 */
class Product extends Model
{
    protected $fillable = [
        'title',
        'quantity',
        'price'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }

    public function cartItems()
    {
        return $this->hasMany('App\Models\CartItem');
    }

    public function productMetas()
    {
        return $this->hasMany('App\Models\ProductMeta');
    }

    public function productReviews()
    {
        return $this->hasMany('App\Models\ProductReview');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'product_tag');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_category');
    }
}
