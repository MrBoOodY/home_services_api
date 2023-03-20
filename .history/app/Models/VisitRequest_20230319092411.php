<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        $table->foreignIdFor(User::class, 'user_id');
        $table->foreignIdFor(User::class, 'sales_id');
        $table->text('notes')->nullable();
        $table->double('lat')->nullable();
        $table->double('long')->nullable();
        $table->enum('status', array(VisitRequestStatus::values()))->default('pending');
    ];

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

        return $this->belongsTo(User::class, 'id')->select(["id", "name", "email"]);
    }
    public function sales()
    {

        return $this->belongsTo(User::class, 'id')->select(["id", "name", "email"]);
    }
}
