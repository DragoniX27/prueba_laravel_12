<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Companie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'company_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
