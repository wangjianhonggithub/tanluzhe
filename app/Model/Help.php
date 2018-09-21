<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $table='helps';

    /**
     * 后台所有分页数据
     * @Author   CarLos(翟)
     * @DateTime 2018-03-29
     * @Email    carlos0608@163.com
     */
    public static function GetHelpAll()
    {
    	$result = Help::orderBy('id', 'desc')->paginate(10);
    	return $result;
    }
    /**
     * 前台所有分页数据
     * @Author   CarLos(翟)
     * @DateTime 2018-03-29
     * @Email    carlos0608@163.com
     */
    public static function GetHomeHelpAll()
    {
        $result = Help::orderBy('id', 'desc')->paginate(5);
        return $result;
    }
    /**
     * 获取单条数据
     * @Author   CarLos(翟)
     * @DateTime 2018-03-09
     * @Email    carlos0608@163.com
     * @param    [type]             $data [description]
     */
    public static function GetOne($id)
    {
    	$result = Help::find($id);
    	return $result;
    }

    public static function ChangeUpdate($id,$data)
    {
    	$result = Help::where('id',$id)->update($data);
    	return $result;
    }
    /**
     * 删除操作
     * @Author   CarLos(翟)
     * @DateTime 2018-03-09
     * @Email    carlos0608@163.com
     * @param    [type]             $id   [description]
     * @param    [type]             $data [description]
     */
    public static function DataDelete($id)
    {
    	$result = Help::destroy($id);
    	return $result;
    }
}
