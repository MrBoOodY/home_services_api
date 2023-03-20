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
        'category',
    ];
    protected $casts = [
        'images' => 'array',

    ];
    public function category()
    {

        return $this->belongsTo(category::class, 'id');
    }
}
