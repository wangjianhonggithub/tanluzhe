<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdvImage extends Model
{
   protected $table = 'adv_images';
   public static function GetAdvImageOne($id)
    {
    	$result = AdvImage::find($id);
    	return $result;
    }
    /**
     * 执行配置文件的修改
     * @Author   CarLos(翟)
     * @DateTime 2018-03-28
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     */
    public static function UpdateAdvImage($id,$data)
    {
    	$result = AdvImage::where('id',$id)->update($data);
        return $result;
    }
}
