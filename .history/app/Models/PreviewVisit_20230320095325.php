<?php

namespace App\Models;

use App\Enums\VisitStatus;
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
        'visit_request',
    ];
    protected $casts = [
        'images' => 'array',
        'status' => VisitStatus::class

    ];
    public function visit_request()
    {
        return $this->belongsTo(VisitRequest::class, 'id');
    }
}
