<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    //选择相应的表
    protected $table = 'column';
    /**
     * 显示列表
     */
    public static function GetColumnAll()
    {
    	$result = Column::where('display',1)->get();
    	return $result;
    }
    /**
     * 执行添加
     */
    public static function AddColumn($data)
    {
    	$result = Column::insert($data);
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
    	$result = Column::find($id);
    	return $result;
    }

    public static function ChangeUpdate($id,$data)
    {
    	$result = Column::where('id',$id)->update($data);
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
    	$result = Column::destroy($id);
    	return $result;
    }
}
