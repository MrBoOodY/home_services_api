<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    $table->text('name')->nullable();
    $table->foreignIdFor(Category::class);
    $table->string('images')->nullable();
    $table->text('description')->nullable();
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
        'contract_id',
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
