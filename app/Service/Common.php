<?php

/**
 * @Author: Administrator
 * @Date:   2018-03-09 14:11:15
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-04-03 11:43:40
 */
namespace App\Service;
/**
* 
*/
use Cookie;
class Common 
{
	
	function __construct()
	{
		
	}
    /**
     *  无限极分类的函数处理
     * @Author   CarLos(翟)
     * @DateTime 2018-03-13
     * @Email    carlos0608@163.com
     * @param    [type]             $arr [description]
     * @param    integer            $pid [description]
     * @param    integer            $lev [description]
     * @return   [type]                  [description]
     */
	public static function tree($arr,$pid=0,$lev=1)
    {
        static $subs = [];
        foreach ($arr as $value) {
            if ($value['pid'] == $pid){
                $value['lev'] = $lev;
                $subs[] = $value;
                $subs = self::tree($arr,$value['id'],$lev+1);
            }
        }
        return $subs;
    }
    /**
     * 单图片上传公共部分
     * @Author   CarLos(翟)
     * @DateTime 2018-03-21
     * @Email    carlos0608@163.com
     * @param    [type]             $uploadname [description]
     * @param    [type]             $request    [description]
     */
    public static function DirUpload($uploadname,$request,$dir)
    {
        if($request->hasFile($uploadname)) {
            //创建文件的名字
            $filename = time().rand(1000000,99999999);
            //获取文件的后缀
            $suffix = $request->file($uploadname)->getClientOriginalExtension();
            //文件夹
            $dirname = './'.$dir.'/';
            //文件名
            $file = $filename .'.'. $suffix;
            //移动文件
            $res = $request->file($uploadname)->move($dirname,$file);
            //修改图片属性
            $DirPath = trim($dirname.$file,'.');
            return $DirPath;
        }
    }

    public static function MoreUpload($uploadname,$request,$dir)
    {
        $file = $request->file($uploadname);
        $filePath =[];  // 定义空数组用来存放图片路径
        foreach ($file as $key => $value) {
          // 判断图片上传中是否出错
            if(!empty($value)){//此处防止没有多文件上传的情况
                $filename = time().rand(1000000,99999999);
                $dirname = './'.$dir.'/';// public文件夹下面uploads/xxxx-xx-xx 建文件夹
                $extension = $value->getClientOriginalExtension();   // 上传文件后缀
                $file = $filename .'.'. $extension;// 重命名
                $value->move($dirname, $file); // 保存图片
                $filePath[] = trim($dirname.$file,'.');
            }
        }
        return $filePath;
    }


    /**
     * 上传软件压缩包并返回文件大小
     * @Author   CarLos(翟)
     * @DateTime 2018-04-03
     * @Email    carlos0608@163.com
     * @param    [type]             $uploadname [description]
     * @param    [type]             $request    [description]
     * @param    [type]             $dir        [description]
     * @return   [type]                         [description]
     */
    public static function software($uploadname,$request,$dir)
    {
        if($request->hasFile($uploadname)) {
            //创建文件的名字
            $filename = time().rand(1000000,99999999);
            //获取文件的后缀
            $suffix = $request->file($uploadname)->getClientOriginalExtension();
            $filesize = $request->file($uploadname)->getClientSize();
            $size = Common::FileSize($filesize);
            //文件夹
            $dirname = './'.$dir.'/';
            //文件名
            $file = $filename .'.'. $suffix;
            //移动文件
            $res = $request->file($uploadname)->move($dirname,$file);
            //修改图片属性
            $DirPath = trim($dirname.$file,'.');
            $data = [
                'DirPath'=>$DirPath,
                'filesize'=>$size
            ];
            return $data;
        }
    }

    /**
     * 转换文件大小
     * @Author   CarLos(翟)
     * @DateTime 2018-04-03
     * @Email    carlos0608@163.com
     * @param    [type]             $size [description]
     */
    public static function FileSize($size)
    {
        $units = array(' B', ' KB', ' MB', ' GB', ' TB'); 
        for ($i = 0; $size >= 1024 && $i < 4; $i++)
        {
          $size /= 1024; 
        }
        return round($size, 2).$units[$i]; 
    } 
    /**
     * 秒滴短信验证接口
     * @Author   CarLos(翟)
     * @DateTime 2018-03-29
     * @Email    carlos0608@163.com
     */
    public static function SmsValidation($mobile)
    {
        $data['param']=rand(1000,9999);
        $url="https://api.miaodiyun.com/20150822/industrySMS/sendSMS";
        $headers[] = 'Content-type:application/x-www-form-urlencoded';
        $data['accountSid'] = 'ba5799466c064e87adfc8df2e23257a5';
        $data['smsContent'] = '【探路者网路】本次授权码为'.$data['param'].'，欢迎您的使用，请在3分钟内输入授权码，若非您本人操作请忽略此短信！';
        $data['templateid'] ='210883122';
        $data['to'] = $mobile;
        $data['timestamp'] =date("YmdHis");
        $AUTHTOKEN = '004dbde037614fbd8acdf64eb6fac951';
        $str = $data['accountSid'].$AUTHTOKEN.$data['timestamp'];
        $data['sig'] = md5($str);
        $fields_string = "";
        foreach($data as $key=>$value){
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');
        $con = curl_init();
        curl_setopt($con, CURLOPT_URL, $url);
        /**
         * 验证SSL证书安全性
         */
        curl_setopt($con, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($con, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        curl_setopt($con, CURLOPT_HEADER, 0);
        curl_setopt($con, CURLOPT_POST, 1);
        curl_setopt($con, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($con, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($con, CURLOPT_POSTFIELDS, $fields_string);
        $result = curl_exec($con);
        curl_close($con);
        Cookie::queue('code',$data['param'],180);
        return $result;
    }
    /**
     * 图片删除
     * @Author   CarLos(翟)
     * @DateTime 2018-03-30
     * @Email    carlos0608@163.com
     * @param    [type]             $request    [description]
     * @param    [type]             $del        [description]
     * @param    [type]             $uploadname [description]
     */
    public static function Del_Image($request,$del,$uploadname)
    {
       if (file_exists('.'.$del[$uploadname]) && !empty($del[$uploadname])) {
          $delete_img = unlink('.'.$del[$uploadname]);
       }
    }

    //    获取图片尺寸   返回样式
    //array:6 [▼
    //0 => 314
    //1 => 165
    //2 => 3
    //3 => "width="314" height="165""
    //"bits" => 8
    //"mime" => "image/png"
    //]
    public static function Get_Image_Size($url)
    {
        if(!empty($url)) {
            $url = substr($url,1);
            $size = getimagesize($url);
            return $size;
        }
    }


}
