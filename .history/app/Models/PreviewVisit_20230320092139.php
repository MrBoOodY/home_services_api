<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviewVisit extends Model
{
    use HasFactory;



    protected $fillable = [
        'visit_request_id',
        'images',
        'notes',
        'lat',
        'long',
        'start_time',
        'end_time',
        'status',
    ];

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'visit_request_id',
    ];

    protected $with = [
        'contract',
    ];
    protected $casts = [
        'images' => 'array',
        'status' => VisitStatus::class

    ];
    public function contract()
    {

        return $this->belongsTo(Contract::class, 'id');
    }
}
