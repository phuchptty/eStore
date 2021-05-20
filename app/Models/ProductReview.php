<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductReview
 *
 * @property int $id
 * @property int $product_id
 * @property int $parent_id
 * @property string $title
 * @property int $rating
 * @property int $published
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|ProductReview[] $child
 * @property-read int|null $child_count
 * @property-read ProductReview $parent
 * @property-read \App\Models\Product $products
 */
class ProductReview extends Model
{
    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\ProductReview', 'parent_id');
    }

    public function child()
    {
        return $this->hasMany('App\Models\ProductReview', 'parent_id');
    }
}
