<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitRequest extends Model
{
    use HasFactory;


    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'contract_id',
    ];

    protected $with = [
        'contract',
    ];

}
