<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment('用户id');
            $table->string('software')->comment('软件路径');
            $table->string('cover')->comment('封面图');
            $table->string('softwarename')->comment('软件名称');
            $table->string('softwaretype')->comment('软件类型');
            $table->string('platform')->comment('使用平台');
            $table->string('charge')->comment('是否免费 1 为免费 0 为收费');;
            $table->string('EffectOne')->nullable($value=true)->comment('图片展示1');
            $table->string('EffectTwo')->nullable($value=true)->comment('图片展示2');
            $table->string('EffectThree')->nullable($value=true)->comment('图片展示3');
            $table->string('EffectFour')->nullable($value=true)->comment('图片展示4');
            $table->string('software_size')->comment('软件大小');
            $table->integer('is_status')->default(0)->comment('审核');
            $table->text('description');
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
        Schema::dropIfExists('software');
    }
}
