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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('channel_id');
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade');
            $table->string('title');
            $table->longText('video');
            $table->string('url');
            $table->longText('thumbnail');
            $table->string('duration');
            $table->string('format');
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('likes')->default(0);
            $table->unsignedBigInteger('dislikes')->default(0);
            $table->string('category');
            $table->string('games_name')->nullable();
            $table->string('description');
            $table->enum('visibility', ['Public', 'Private']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
