<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Only add the 'token' column if it doesn't already exist
            if (!Schema::hasColumn('users', 'token')) {
                $table->string('token')->nullable();
            }

            // Add the 'email_verified_at' column to track when the user verifies their email
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the 'token' column if needed
            if (Schema::hasColumn('users', 'token')) {
                $table->dropColumn('token');
            }

            // Drop the 'email_verified_at' column
            $table->dropColumn('email_verified_at');
        });
    }
};
