<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cart
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @property string $session_id
 * @property string $token
 * @property string $status
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $mobile
 * @property string $email
 * @property string $line1
 * @property string $line2
 * @property string $city
 * @property string $provide
 * @property string $country
 * @property string $content
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereProvide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CartItem[] $cartItems
 * @property-read int|null $cart_items_count
 * @property-read \App\User $users
 */
class Cart extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function cartItems()
    {
        return $this->hasMany('App\Models\CartItem');
    }
}
