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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('mark', 30);
            $table->string('model', 30);
            $table->string('generation', 50);
            $table->integer('year');
            $table->integer('run');
            $table->string('color', 30);
            $table->string('body_type', 30);
            $table->string('engine_type', 30);
            $table->string('transmission', 30);
            $table->string('gear_type', 30);
            $table->bigInteger('generation_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
};
