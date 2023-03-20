<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
    ];

    protected $with = [
        'contract',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'id');
    }
}
