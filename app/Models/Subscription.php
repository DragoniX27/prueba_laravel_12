<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'company_id',
        'plan_id',
        'start_date',
        'end_date',
        'is_active',
    ];

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Companie::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
