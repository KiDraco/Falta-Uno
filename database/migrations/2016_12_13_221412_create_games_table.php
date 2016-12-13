<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned();
            $table->integer('capacity')->unsigned();
            $table->dateTime('time');
            $table->string('type');
            $table->string('name');
            $table->string('privacy_status')->default('public');
            $table->dateTime('filled_at')->nullable();
            $table->dateTime('cancelled_at')->nullable();
            $table->timestamps();
        });

        Schema::table('games', function ($table) {
            $table->foreign('admin_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
