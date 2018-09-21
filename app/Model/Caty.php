<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Caty extends Model
{
    protected $table='caties';
   
    public static function GetCatyAll()
    {
    	$result = Caty::orderBy('id', 'desc')->paginate(15);
    	return $result;
    }

    public static function GetCatyHomeAll()
    {
        $result = Caty::all();
        return $result;
    }
    /**
     * 获取一条数据
     * @Author   CarLos(翟)
     * @DateTime 2018-03-20
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     */
    public static function GetCatyOne($id)
    {
    	$result = Caty::find($id);
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
    public static function UpdateCaty($id,$data)
    {
    	$result = Caty::where('id',$id)->update($data);
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
        $result = Caty::destroy($id);
        return $result;
    }
}
