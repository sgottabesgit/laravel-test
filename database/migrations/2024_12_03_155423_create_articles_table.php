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
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title', 64); // Title (max 64 characters)
            $table->string('url', 1024); // URL (max 1024 characters)
            $table->unsignedInteger('views')->default(0); // View count (default to 0)
            $table->timestamps(); // Created_at and Updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
