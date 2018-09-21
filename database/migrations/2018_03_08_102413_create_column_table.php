<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('column', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid');
            $table->string('name');
            $table->string('url');
            $table->string('icon');
            $table->string('display')->default(1);
            $table->string('create_time');
            $table->string('update_time');
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
        Schema::dropIfExists('column');
    }
}
