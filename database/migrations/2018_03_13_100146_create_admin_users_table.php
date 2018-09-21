<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->comment('后台用户名');
            $table->string('password')->comment('后台用户密码');
            $table->string('nickname')->comment('昵称');
            $table->integer('status')->default(1)->comment('用户状态1为启用0为禁用');
            $table->string('column_role')->nullable($value=true)->comment('侧边栏的权限状态');
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
        Schema::dropIfExists('admin_users');
    }
}
