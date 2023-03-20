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

    protected $hidden = [];

    protected $with = [
        'user',
        'sales',

    ];

    public function user()
    {

        return $this->belongsTo(User::class, 'id')->select();
    }
    public function sales()
    {

        return $this->belongsTo(User::class, 'id')->select();
    }
}
