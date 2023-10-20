<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->int('player_id');
            $table->foreign('playalong_id')
            ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('spell_id')
            ->references('id')->on('spells')->onDelete('cascade');
            $table->int('score');
            $table->int('time_taken');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
};
