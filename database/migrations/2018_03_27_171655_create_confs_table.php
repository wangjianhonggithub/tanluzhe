<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('qr_code')->nullable($value=true)->comment('二维码');
            $table->string('address')->nullable($value=true)->comment('公司地址');
            $table->string('email')->nullable($value=true)->comment('公司邮箱');
            $table->string('mobile')->nullable($value=true)->comment('电话');
            $table->string('zip_code')->nullable($value=true)->comment('邮编');
            $table->string('switchboard')->nullable($value=true)->comment('总机电话');
            $table->string('adv_mobile')->nullable($value=true)->comment('广告服务电话');
            $table->string('c_map')->nullable($value=true)->comment('公司地图');
            $table->string('record')->nullable($value=true)->comment('备案号');
            $table->text('up_ins')->nullable($value=true)->comment('上传须知');
            $table->string('logo')->nullable($value=true)->comment('logo');
            $table->string('logo_int')->nullable($value=true)->comment('logo导语');
            $table->text('vip_ins')->nullable($value=true)->comment('注册会员须知');
            $table->text('upload_rules')->nullable($value=true)->comment('上传规则');
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
        Schema::dropIfExists('confs');
    }
}
