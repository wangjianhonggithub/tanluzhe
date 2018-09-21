<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->comment('用户名');
            $table->string('password')->comment('密码');
            $table->string('mobile')->comment('手机号');
            $table->string('email')->comment('邮箱');
            $table->integer('encrypted')->comment('密保');
            $table->string('answer')->comment('答案');
            $table->string('header_pic')->default('/Home/default.jpg')->comment('头像');
            $table->string('nickname')->nullable($value=true)->comment('昵称');
            $table->integer('is_freeze')->default(1)->comment('是否被冻结,1未被冻结 0已经冻结');
            $table->string('is_cert')->default(0)->comment('是否认证开发人员,0是未认证,1已认证');
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
        Schema::dropIfExists('users');
    }
}
