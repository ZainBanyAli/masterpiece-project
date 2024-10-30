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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id'); // Use unsignedBigInteger for the foreign key
            $table->string('featured_photo')->nullable();
            $table->string('banner')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('map')->nullable();
            $table->string('price')->nullable();
            $table->string('old_price')->nullable();
            $table->integer('total_rating')->default(0);
            $table->integer('total_score')->default(0);
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
        Schema::dropIfExists('packages');
    }
};
