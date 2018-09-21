<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Conf extends Model
{
    protected $table='confs';
    public static function GetConfOne($id)
    {
    	$result = Conf::find($id);
    	return $result;
    }
    /**
     * 执行配置文件的修改
     * @Author   CarLos(翟)
     * @DateTime 2018-03-28
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     */
    public static function UpdateConf($id,$data)
    {
    	$result = Conf::where('id',$id)->update($data);
        return $result;
    }
}
