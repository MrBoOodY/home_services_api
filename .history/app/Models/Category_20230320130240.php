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

    protected $hidden = [ 
    ];

    protected $with = [
        'category',
    ];
    protected $casts = [
        'images' => 'array',

    ];
    public function category()
    {

        return $this->belongsTo(Category::class, 'id');
    }
}
