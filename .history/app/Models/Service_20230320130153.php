<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

 
    protected $fillable = [
        'name',
        'images',
        'category_id',
        'description', 
    ];

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'category_id',
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
