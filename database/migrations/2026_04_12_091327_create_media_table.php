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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('media_categories')->onDelete('cascade');
            $table->string('title');
            $table->enum('type', ['video', 'image', 'link']);
            $table->string('file_path')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('external_link')->nullable();
            $table->boolean('show_on_home')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
