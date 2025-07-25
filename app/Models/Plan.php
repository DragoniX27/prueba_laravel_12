<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'monthly_price',
        'limit_users',
        'features',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
