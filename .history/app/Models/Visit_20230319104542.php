<?php

namespace App\Models;

use App\Enums\VisitStatus;
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

    protected $hidden = [
        'contract_id',
    ];

    protected $with = [
        'contract',
    ];

    public function contract()
    {

        return $this->belongsTo(Contract::class, 'id');
    }

    protected $casts = [
        'images' => 'array',
        'status' => VisitStatus::class

    ];
}
