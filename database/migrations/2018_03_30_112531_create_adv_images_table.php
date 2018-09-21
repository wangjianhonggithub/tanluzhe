<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adv_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ind_s')->nullable($value=true)->comment('首页banner上');
            $table->string('ind_x')->nullable($value=true)->comment('首页banner下');
            $table->string('ind_z')->nullable($value=true)->comment('首页中部');
            $table->string('list_h')->nullable($value=true)->comment('列表横幅');
            $table->string('list_s')->nullable($value=true)->comment('列表banner上');
            $table->string('list_x')->nullable($value=true)->comment('列表banner下');
            $table->string('info_bz')->nullable($value=true)->comment('详情banner左');
            $table->string('info_bc')->nullable($value=true)->comment('详情banner中左');
            $table->string('info_bcy')->nullable($value=true)->comment('详情banner中右');
            $table->string('info_by')->nullable($value=true)->comment('详情banner右');
            $table->string('info_z')->nullable($value=true)->comment('详情中部');
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
        Schema::dropIfExists('adv_images');
    }
}
