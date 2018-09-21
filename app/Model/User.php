<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='users';
    public static function GetOne($id)
    {
    	$result = User::find($id);
    	return $result;
    }

    public static function GetUserAll()
    {
        $result = User::orderBy('id', 'desc')->paginate(15);
        return $result;
    }
    /**
     * 多条件搜索
     * @Author   CarLos(翟)
     * @DateTime 2018-05-17
     * @Email    carlos0608@163.com
     */
    public static function GetSearchUserAll($where=[])
    {
        $result = User::where($where)->orderBy('id', 'desc')->paginate(15);
        return $result;
    }

    public static function ChangeUpdate($id,$data)
    {
    	$result = User::where('id',$id)->update($data);
    	return $result;
    }
}
