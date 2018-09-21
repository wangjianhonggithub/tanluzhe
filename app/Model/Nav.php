<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
   protected $table='navs';
   
   public static function GetNavAll()
    {
    	$result = Nav::orderBy('id', 'desc')->paginate(15);
    	return $result;
    }
    /**
     * 获取一条数据
     * @Author   CarLos(翟)
     * @DateTime 2018-03-20
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     */
    public static function GetNavOne($id)
    {
    	$result = Nav::find($id);
    	return $result;
    }
    /**
     * 执行修改
     * @Author   CarLos(翟)
     * @DateTime 2018-03-20
     * @Email    carlos0608@163.com
     * @param    [type]             $id   [description]
     * @param    [type]             $data [description]
     */
    public static function UpdateNav($id,$data)
    {
    	$result = Nav::where('id',$id)->update($data);
        return $result;
    }
    /**
     * 执行删除
     * @Author   CarLos(翟)
     * @DateTime 2018-03-20
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     */
    public static function DataDelete($id)
    {
        $result = Nav::destroy($id);
        return $result;
    }
}
