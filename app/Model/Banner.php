<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table='banners';
   
   public static function GetBannerAll()
    {
    	$result = Banner::orderBy('id', 'desc')->paginate(15);
    	return $result;
    }
    /**
     * 获取一条数据
     * @Author   CarLos(翟)
     * @DateTime 2018-03-20
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     */
    public static function GetBannerOne($id)
    {
    	$result = Banner::find($id);
    	return $result;
    }

    public static function GetBannerSelect($id)
    {

        $result = Banner::where('c_id',$id)->get();
      
        if ($result) {
            foreach ($result as $k => $value) {


                if (isset($value['user_image']) && $value['user_image']) {

                    $result[$k]['banner_img'] = $value['user_image'];

                }
            }
        } 
                // var_dump($result->toArray());die;
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
    public static function UpdateBanner($id,$data)
    {
    	$result = Banner::where('id',$id)->update($data);
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
        $result = Banner::destroy($id);
        return $result;
    }
}
