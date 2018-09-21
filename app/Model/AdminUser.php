<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = 'admin_users';

    public static function GetData()
    {
    	$result = AdminUser::orderBy('id', 'desc')->paginate(15);
    	return $result;
    }
    /**
     * 查询单条的结果
     * @Author   CarLos(翟)
     * @DateTime 2018-03-13
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     */
    public static function GetOne($id)
    {
    	$result = AdminUser::find($id);
    	return $result;
    }
    /**
     * 更改数据
     * @Author   CarLos(翟)
     * @DateTime 2018-03-13
     * @Email    carlos0608@163.com
     * @param    id             $id   数据id
     * @param    data             $data 数据
     */
    public static function ChangeUpdate($id,$data)
    {
    	$result = AdminUser::where('id',$id)->update($data);
    	return $result;
    }
    /**
     * 删除
     * @Author   CarLos(翟)
     * @DateTime 2018-03-13
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     */
    public static function DataDelete($id)
    {
    	$result = AdminUser::destroy($id);
    	return $result;
    }
}
