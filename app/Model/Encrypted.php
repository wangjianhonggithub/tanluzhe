<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Encrypted extends Model
{
    protected $table='encrypteds';
   
    public static function GetEncryptedAll()
    {
    	$result = Encrypted::orderBy('id', 'desc')->paginate(15);
    	return $result;
    }

    /**
     * 获取所有的数据
     */
    public static function EncryptedAll()
    {
        $result = Encrypted::all();
        return $result;
    }
    /**
     * 获取一条数据
     * @Author   CarLos(翟)
     * @DateTime 2018-03-20
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     */
    public static function GetEncryptedOne($id)
    {
    	$result = Encrypted::find($id);
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
    public static function UpdateEncrypted($id,$data)
    {
    	$result = Encrypted::where('id',$id)->update($data);
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
        $result = Encrypted::destroy($id);
        return $result;
    }
}
