<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
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
        'contract',
    ];

    public function FunctionName(Type $var = null)
    {
        # code...
    }

    protected $casts = [
        'images' => 'array',
    ];
}