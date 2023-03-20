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

    protected $hidden = [
        'contract_id',
    ];

    protected $with = [
        'contract',
    ];

    public function contract()
    {
        $this->belongsTo(Contract::class, 'id')->query()
    ->with(['user' => function ($query) {
        $query->select('id', 'username');
    }])
    ->get()
        dd($this->belongsTo(Contract::class, 'id'));
        return $this->belongsTo(Contract::class, 'id');
    }

    protected $casts = [
        'images' => 'array',
    ];
}
