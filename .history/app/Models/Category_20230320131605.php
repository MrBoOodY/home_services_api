<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected $with = [
        'services',
    ];
    protected $casts = [];
    public function services()
    {

        return $this->hasMany(Service::class, 'id');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
