<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'notes',
        'lat',
        'long',
        'sales_id',
        'user_id',
        'status',
    ];

    protected $guarded = [
        'id',
    ];

    protected $hidden = [];

    protected $with = [
        'user',
        'sales',

    ];
    protected $casts = [
        'status' => ProductStatusEnum::class
    ];
    public function user()
    {

        return $this->belongsTo(User::class, 'id')->select(["id", "name", "email"]);
    }
    public function sales()
    {

        return $this->belongsTo(User::class, 'id')->select(["id", "name", "email"]);
    }
}
