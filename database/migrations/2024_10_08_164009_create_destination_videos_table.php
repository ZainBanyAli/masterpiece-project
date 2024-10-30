<?php

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
        Schema::create('destination_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id'); // Ensure compatibility with the id type in destinations
            $table->string('video')->nullable();
            $table->timestamps();

            // Add the foreign key constraint
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination_videos');
    }
};