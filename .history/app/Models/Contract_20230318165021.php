<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $with = [
        'user',
    ];

    public function user()
    {
        dd($this->belongsTo(User::class, 'id'));
        return $this->belongsTo(User::class, 'id');
    }
}
