<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();;
            $table->integer('courses_id')->unsigned();;
            $table->boolean('authorized')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->
            references('id')->
            on('users')-> 
            onDelete('cascade');

            $table->foreign('courses_id')->
            references('id')->
            on('courses')-> 
            onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
