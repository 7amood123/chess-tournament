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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player1_id');
            $table->unsignedBigInteger('player2_id');
            $table->unsignedBigInteger('tournament_id');
            $table->integer('round');
            $table->enum('result', ['1-0', '0-1', '0.5-0.5'])->nullable();
            $table->dateTime('schedule');
            $table->timestamps();

            // Foreign keys
            $table->foreign('player1_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('player2_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
