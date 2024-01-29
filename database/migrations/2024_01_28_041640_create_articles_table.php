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
            $table->id();
            $table->uuid('article_uuid');
            $table->foreignId('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('article_author')->nullable();
            $table->string('article_title')->nullable();
            $table->text('article_content')->nullable();
            $table->string('article_img')->nullable();
            $table->timestamps();
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
