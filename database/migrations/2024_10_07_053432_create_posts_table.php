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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_category_id')
                  ->constrained('blog_categories')
                  ->onDelete('cascade'); // Delete posts if the related category is deleted
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
