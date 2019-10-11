<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;
use Cookie;

class PayController extends Controller
{
	protected $config = [
        'app_id' => '2018082061121080',
        'notify_url' => 'http://explorernetwork.cn/notify',
        'return_url' => 'http://explorernetwork.cn/collback?',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAyW/o40N8SRp7hQjMCDB8VMMsmG+FziKYzSKUXaNJtOXC0Ss5BnYVVBuQD3je8XbCwEu6dKzOZawIzu/TivG9qUN7bd9N860pHX09zhs6rZp9/0KY/flfaPY6EiWQCbvfV/TaINcz52X87U6K1ezjGg3V2rSAfJjjXloJxlc9S+WF6lIhyjO9QfMfwhg4QZLpFXy0XvBfKArZr7v2ia+hWcmUl73xtb7hipAExBIgAB7tZEOTSkBDoqgeQShsj90k3xxR0RHoI9lrCL5IzuNHYIteodqkzfzR2Q5HIiHfGPMlKJP+oBWfEFhoeRUsTIAA/LzNLIghBKIeP7/JcKFwxQIDAQAB',
        // 加密方式： **RSA2**
        'private_key' => "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCjwlv24pBTvO3vh3tooYd27VJRoVTqRWujO0Y5/2NUyqZlrYhKEBr2e2DxN7KLqv+b5NPVUf5zjWdGPnde4RxUBKfqmczQbP81JCWHKpTWSSxZgkGt4Tfaha0dMHMSqVWgnxvgYpxcyn/RToLOAMJ+sjJjjYGGD3qoLSMIl4Vx0aodO7o5kQsNoIB1ESp7eiErqot1K6rPpHHu/vLONujI1Z0oagpwYo5QlJCsoJuE5jCLUtLXAbycGNgtp7zDErYuBbUpjB2OZKhCFCn7v9UJgtez53eVJWjTVCwfZHVWWPGGsQvS4X3WYJAi0bn6IGoPX0Tay4FhIHp0SYsNxgvZAgMBAAECggEAPUdhuoUVlQBB2TxNhd3MH0i3YSyJ5hCMMszffpx+wyACHFJPicd1D38jy6AYBAO9Gs0KJ+1C1mK3nqWJbcu3GgmT/EoJRoVDCtO351ib0YQYQHZptXNtvyv+l8mlhfovvKdNey3rbR2prt0+PXAzV82+5VnyegQY1g3t6i0pFmnRExdgZHBwRNEG3GSqKeVgFZoI6/9rwMT7+lzmpzrc2bceVB6rnaL5XGUQ+B3Nac9yTG5X4MxkUHGMImVxDuiY+Pwc9gXWqUK5wJjpiEb8u/LWA7DoGNU4HMOquMt4iTU4e5O3xex5ih/BeuvpGQnyRrPGZKKK9OcyIwd5GoMQAQKBgQDdmiDbWu7qsGgPRH41ncTt7W2kxtbLIhcMlurNHaWRO7ZEQnSVViQBSaAf7Jg0MpscKUmbVCWhGywiccXQgsmNbM6ma5IQWztbogMlHN0MCdqKbUsvbTz0HXCiAhCgXvMMKleQBUZCcSh0oc/1IldpGiGbuOu/olf6yN0VhCSYgQKBgQC9LbYUUWi/ZVlj5ZZFLQwSWdDawnQxTpf+bLz+cEp7nx6C/srpbcTjIfHrv4C5v/mH65yxPGqQXf9+Xgrj5X47JvXw8s80KqurNRqkZ3YLZnZ3ttv14V687Qysbq9jAoc9lKzKqUbked/XalHFdZZcr91HVnnA6nptRjFVKCGHWQKBgQDYsvrEZpTRzTXFEE528dP8crxQcNzkgW6WshHkCMS6U/D1qSLGUhkdZTj/XuarzHzfugQvr8aoV6D+AdHWB78+3BLsrK6F7iEKh1CZ/zKtrgkWarAmLaV4dj2JP4mwuYjk8Zb00COXn35XJ1DrvuxJa/NHizqGCCQOqlN/0dvTgQKBgCBnphrQ3xp559f+ycDLuJekHux6BqEzj0GbqrwCzB9k4DscHfHiRamKdQAm64vl4H5x04Ngj/huwYcJ4N+svfSv9czyKqAK9yD6lbe3qTbGtGBJSGBT3ICMMnGO/Cf/lN7tirOkT2pvnfIuWhdyzvDNhx/jJjPvdk0liunFWAjxAoGAeYu9MrTGg/RREuQY4Udm+5UNdfa5Bc4AfHKPx9CrEn6LRnGGd9t9UoVgsgO4/Vi4BaNUQMCHH0l0bu9L+ptpXJrdY9AxPKkO2bFnvQ3Bfz70+u8cgAYF+08hJ2Kymjj32CQTBMo7R2VBYSKXMxHTyrWUQ5Rc1u1pKiMo9DVuMlk=",
        'log' => [ // optional
            'file' => './logs/alipay.log',
            'level' => 'debug',
            'type' => 'single', // optional, 可选 daily.
            'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
        ],
//        'mode' => 'dev', // optional,设置此参数，将进入沙箱模式
    ];

	
	protected $config2 = [
		'app_id'     => 'wxfb7497b7608a5c23', // 公众号 APPID
		'mch_id'     => '1510712731',
		'key'        => 'E2x0P0l8SO8R1e1R5n2ESt8oRKCNEKPA',
		'notify_url' => 'http://explorernetwork.cn/notify2',
		'log'        => [ // optional
			'file'   => './logs/wechat.log',
			'level'  => 'debug'
		],
	];
	//'miniapp_id' => 'wxb3fxxxxxxxxxxx', // 小程序 APPID
	//'appid' => 'wxb3fxxxxxxxxxxx', // APP APPID
	//'cert_client' => './cert/apiclient_cert.pem', // optional, 退款，红包等情况时需要用到
	//'cert_key' => './cert/apiclient_key.pem',// optional, 退款，红包等情况时需要用到
	public function wxPay($order)
    {
		/**$order = [
			'out_trade_no' => time(),
			'body'         => '测试',
			'total_fee'    => '1',

		];**/
		$result = Pay::wechat($this->config2)->scan($order);
		//$result = $wechat->scan($order);
		//var_dump($result);
		//$a = $this->scerweima2($result->code_url);
		//echo $a;die();
		include_once 'phpqrcode.php';
		$value = $result->code_url;//二维码内容
		$level = 'H';//容错级别
		$size = 5;//生成图片大小
	 
		//生成二维码图片
		QRcode::png($value, 'qrcode.png', $level, $size, 2);
		$QR = 'qrcode.png';//已经生成的原始二维码图

		$QR = imagecreatefromstring(file_get_contents($QR));
		//输出图片
		Header("Content-type: image/png");
		return ImagePng($QR);
		//var_dump(ImagePng($QR));die();
		
		
		
		
		
		//var_dump($a);die();
    }
	//二维码QRcode
    public function scerweima2($url=''){
		require_once 'phpqrcode.php';
		//include('phpqrcode.php'); 
		//include 'phpqrcode.php'; 
		$value = $url;         //二维码内容
		$errorCorrectionLevel = 'L';  //容错级别
		$matrixPointSize = 5;      //生成图片大小
		//生成二维码图片
		$QR = QRcode::png($value,false,$errorCorrectionLevel, $matrixPointSize, 2);
		return $QR;
	}

    /**
     * 支付完成，返回的回调地址
     */
    public function collback(Request $request)
    {
		
		$out_trade_no = $_GET['out_trade_no'];
		$data['channel'] = 1;
        $data['status'] = 1;
		
        $id = Cookie::get('UserId');
        $this->isSetUser();//判断用户是否存在账户，不存在创建！
        $total_amount = DB::table('transactions')
            ->where('out_trade_no',$out_trade_no)
            ->value('total_amount');
        if(empty($total_amount)){
            $total_amount=0;
        }else{
            $total_amount = $total_amount;
        }

        $res1 = DB::table('transactions')->where('out_trade_no',$out_trade_no)->update($data);
        $res2 = DB::table('accounts')->where('uid',$id)->increment('balance',$total_amount);
		return redirect('/Tixian/zhanghu?type=2')->with('info','充值成功');
    }
	/**
     * 判断用户是存在账号中心表
     * 存在跳过，不存在创建
     */
    protected function isSetUser()
    {
        $id = Cookie::get('UserId');
        $result = DB::table('accounts')->where('uid',$id)->first();
        if(empty($result)) {
            $data['uid'] = $id;
            $data['balance'] = 0;
            $data['addtime'] = date('Y-m-d H:i:s');
            DB::table('accounts')->insert($data);
        }

    }

	public function huidiao(){
		//return $_POST['out_trade_no'];
		$transactions = db::table('transactions')->where('out_trade_no',$_POST['out_trade_no'])->first();
		if($transactions->status ==1){
			return 1;
		}else{
			return 0;
		}
	}

    /**
     * 支付
     * @param array $order
     * @return mixed
     */
    public function toPay($order=array(),$res=0)
    {
		header("Content-type: text/html; charset=utf-8");
		//print_r($this->config);exit;
        $alipay = Pay::alipay($this->config)->web($order);
			
		
		
        return $alipay->send();// laravel 框架中请直接 `return $alipay`
    }


    public function index()
    {
        $order = [
            'out_trade_no' => time(),
            'total_amount' => '0.01',
            'subject' => '探路者',
        ];

        $alipay = Pay::alipay($this->config)->web($order);

        return $alipay->send();// laravel 框架中请直接 `return $alipay`
    }
	
    
    public function return()
    {
        $data = Pay::alipay($this->config)->verify(); // 是的，验签就这么简单！
        // 订单号：$data->out_trade_no
        // 支付宝交易号：$data->trade_no
        // 订单总金额：$data->total_amount
    }

    public function notify(Request $request)
    {
		
		//var_dump($request);die();
        $alipay = Pay::alipay($this->config);

        try{
            //$newData['orderStatus'] = 0;
            //DB::table('order')->where('OrderNo','=',$request->out_trade_no)->update($newData);
            // 请自行对 trade_status 进行判断及其它逻辑进行判断，在支付宝的业务通知中，只有交易通知状态为 TRADE_SUCCESS 或 TRADE_FINISHED 时，支付宝才会认定为买家付款成功。
            // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号；
            // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）；
            // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）；
            // 4、验证app_id是否为该商户本身。
            // 5、其它业务逻辑情况

            file_put_contents(storage_path('notify.txt'), "收到来自支付宝的异步通知\r\n", FILE_APPEND);
            file_put_contents(storage_path('notify.txt'), '订单号：' . $request->out_trade_no . "\r\n", FILE_APPEND);
            file_put_contents(storage_path('notify.txt'), '订单金额：' . $request->total_amount . "\r\n\r\n", FILE_APPEND);
            file_put_contents(storage_path('notify.txt'), '订单金额：' . $request->total_amount . "\r\n\r\n", FILE_APPEND);

        } catch (Exception $e) {
            // $e->getMessage();
        }

        return $alipay->success()->send();// laravel 框架中请直接 `return $alipay->success()`
    }

}
