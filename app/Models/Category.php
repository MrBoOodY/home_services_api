<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'image',
    ];

    protected $guarded = [
        'id',
    ];

    protected $hidden = [];

    protected $with = [];
    protected $casts = [];

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
