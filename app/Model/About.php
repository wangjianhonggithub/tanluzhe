<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
   protected $table='abouts';
   
   public static function GetAboutAll()
    {
    	$result = About::orderBy('id', 'desc')->paginate(15);
    	return $result;
    }
    /**
     * 获取一条数据
     * @Author   CarLos(翟)
     * @DateTime 2018-03-20
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     */
    public static function GetAboutOne($id)
    {
    	$result = About::find($id);
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
    public static function UpdateAbout($id,$data)
    {
    	$result = About::where('id',$id)->update($data);
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
        $result = About::destroy($id);
        return $result;
    }
}
