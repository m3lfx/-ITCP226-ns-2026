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
        Schema::create('album_listener', function (Blueprint $table) {
            $table->unsignedBigInteger('album_id')->index();
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->unsignedBigInteger('listener_id')->index();
            $table->foreign('listener_id')->references('id')->on('listeners')->onDelete('cascade');
            $table->primary(['album_id', 'listener_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_listener');
    }
};