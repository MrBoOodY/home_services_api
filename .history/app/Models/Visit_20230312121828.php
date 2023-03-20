<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    
    protected $guarded = [
        'id',
    ];

    protected $with = [
        'contract',
    ];

    public function contract()
    {
        return $this->belongsTo(User::class, 'id');
    }

    protected $casts = [
        'images' => 'array',
    ];
}
