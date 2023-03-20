<?php

use App\Enums\VisitRequestStatus;
use App\Models\VisitRequest;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('preview_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(VisitRequest::class);
            $table->string('images')->nullable();
            $table->text('notes')->nullable();
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('duration')->nullable();
            $table->enum('status', array(VisitRequestStatus::values()))->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preview_visits');
    }
};
