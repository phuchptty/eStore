<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductMeta
 *
 * @property int $id
 * @property int $product_id
 * @property string $key
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductMeta whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Product $products
 */
class ProductMeta extends Model
{
    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
