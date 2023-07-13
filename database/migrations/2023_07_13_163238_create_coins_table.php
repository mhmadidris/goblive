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
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_channel_id');
            $table->foreign('from_channel_id')->references('id')->on('channels')->onDelete('cascade');
            $table->unsignedBigInteger('to_channel_id');
            $table->foreign('to_channel_id')->references('id')->on('channels')->onDelete('cascade');
            $table->unsignedBigInteger('video_id');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
            $table->integer('coin')->default(0);
            $table->text('pesan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coins');
    }
};