<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    use HasFactory;


    protected $fillable = [
        'contract_id',
        'images',
        'notes',
        'lat',
        'long',
        'start_time',
        'end_time',
        'duration',
        'status',
    ];

    protected $guarded = [
        'id',
    ];
    protected $with = [
        'user',
    ];

    protected $casts = [
        'status' => VisitStatus::class,
        'images' => 'array',
    ];
}
