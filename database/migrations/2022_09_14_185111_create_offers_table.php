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
            $table->string('generation', 30);
            $table->integer('year');
            $table->integer('run');
            $table->string('color', 30);
            $table->string('body-type', 30);
            $table->string('engine-type', 30);
            $table->string('transmission', 30);
            $table->string('gear-type', 30);
            $table->integer('generation_id');
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
