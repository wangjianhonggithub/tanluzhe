<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cookie;
use EasyWeChat\Factory;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class Pay2Controller extends Controller
{
	protected $config = [
		'app_id'     => 'wxfb7497b7608a5c23', // 公众号 APPID
		'mch_id'     => '1510712731',
		'key'        => 'E2x0P0l8SO8R1e1R5n2ESt8oRKCNEKPA',
		'notify_url' => 'http://explorernetwork.cn/notify',
		'log'        => [ // optional
			'file'   => './logs/wechat.log',
			'level'  => 'debug'
		],
	];
	private function payment()
    {
        $config = [
            // 必要配置, 这些都是之前在 .env 里配置好的
            'app_id'     => 'wxfb7497b7608a5c23', // 公众号 APPID
            'mch_id'     => '1510712731',
            'key'        => 'E2x0P0l8SO8R1e1R5n2ESt8oRKCNEKPA',
            'notify_url' => 'http://explorernetwork.cn/notify',
        ];
        // 这个就是 easywechat 封装的了, 一行代码搞定, 照着写就行了
        $app = Factory::payment($config);

        return $app;
    }
    public function index($out_trade_no){
		$transactions = db::table('transactions')->where('out_trade_no',$out_trade_no)->first();
        // 因为没有先创建订单, 所以这里先生成一个随机的订单号, 存在 pay_log 里, 用来标识订单, 支付成功后再把这个订单号存到 order 表里
        //$order_sn = date('ymd').substr(time(),-5).substr(microtime(),2,5);
		$order_sn = $transactions->out_trade_no;
        // 根据文章 id 查出文章价格
        $post_price = $transactions->total_amount;
        // 创建 Paylog 记录
        // PayLog::create([
        //     'appid' => config('wechat.payment.default.app_id'),
        //     'mch_id' => config('wechat.payment.default.mch_id'),
        //     'out_trade_no' => $order_sn,
        //     'post_id' => '41'
        // ]);
        // $file = fopen("b.txt","a+"); //次方法会自动生成文件test,txt,a表示追加写入，

        $app = $this->payment();
		  
        // var_dump(self::objectToArray($app));die;
        // print_r($app);die();

        // fwrite($file,json_encode(self::objectToArray($app)));
        // fclose($file);


        //$total_fee = env('APP_DEBUG') ? 1 : $post_price;
		$total_fee = $post_price*100;
        // 用 easywechat 封装的方法请求微信的统一下单接口
        $result = $app->order->unify([
            'trade_type'       => 'NATIVE', // 原生支付即扫码支付，商户根据微信支付协议格式生成的二维码，用户通过微信“扫一扫”扫描二维码后即进入付款确认界面，输入密码即完成支付。  
            'body'             => '微信支付', // 这个就是会展示在用户手机上巨款界面的一句话, 随便写的
            'out_trade_no'     => $order_sn,
            'total_fee'        => $total_fee,
            'spbill_create_ip' => request()->ip(), // 可选，如不传该参数，SDK 将会自动获取相应 IP 地址
        ]);

        if ($result['result_code'] == 'SUCCESS') {
            // 如果请求成功, 微信会返回一个 'code_url' 用于生成二维码
            $code_url = $result['code_url'];
			//return QrCode::size(200)->generate(date('Y-m-d H:i:s'));
			// return QrCode::size(200)->generate($code_url);
			$data = [
					'code'     => 200,
					// 订单编号, 用于在当前页面向微信服务器发起订单状态查询请求
					'order_sn' => $order_sn,
					// 生成二维码
				   'html' => QrCode::size(200)->generate($code_url),
				];

			/**return view('/Home/Tixian/scerweima',[
				'data'=>$data,
			]);**/

			return $data;
        }
    }

/*    function arrayToObject($e){

    if( gettype($e)!='array' ) return;
    foreach($e as $k=>$v){
        if( gettype($v)=='array' || getType($v)=='object' )
            $e[$k]=(object)arrayToObject($v);
    }
    return (object)$e;
    }*/
     
    public static function objectToArray($e){
        $e=(array)$e;
        foreach($e as $k=>$v){
            if( gettype($v)=='resource' ) return;
            if( gettype($v)=='object' || gettype($v)=='array' )
                $e[$k]=(array)self::objectToArray($v);
        }
        return $e;
    }



    public static function fileToBase64($file){
        $base64_file = '';
        if(file_exists($file)){
            $mime_type= mime_content_type($file);
            $base64_data = base64_encode(file_get_contents($file));
            $base64_file = 'data:'.$mime_type.';base64,'.$base64_data;
        }
        return $base64_file;
    }
    public function notify2(){

        $xml = file_get_contents('php://input');


        libxml_disable_entity_loader(true);


        $xmlArr = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);

        $out_trade_no=$xmlArr['out_trade_no']; //订单号
        $total_fee=$xmlArr['total_fee']/100; //回调回来的xml文件中金额是以分为单位的
        $result_code=$xmlArr['result_code']; //状态
        $return_code=$xmlArr['return_code'];
        //file_put_contents('weixinpc.txt',$out_trade_no);
        
        $order = db::table('transactions')->where(['out_trade_no'=>$out_trade_no])->update(['status'=>1]);
		
		//处理结果
		//$id = Cookie::get('UserId');
		$id = db::table('transactions')->where(['out_trade_no'=>$out_trade_no])->value('uid');
		$this->isSetUser2($id);//判断用户是否存在账户，不存在创建！
		$total_amount = DB::table('transactions')
			->where(['out_trade_no'=>$out_trade_no])
			->value('total_amount');
		if(empty($total_amount)){
			$total_amount=0;
		}else{
			$total_amount = $total_amount;
		}
		$res2 = DB::table('accounts')->where('uid',$id)->increment('balance',$total_amount);
		
		
    
        if($result_code=="SUCCESS" && $return_code=="SUCCESS"){
        //数据库操作
            echo 'SUCCESS'; //返回成功给微信端 一定要带上不然微信会一直回调8次
            exit;
        }else{ //失败
            return;
            exit;
        }

    }
	/**
     * 判断用户是存在账号中心表
     * 存在跳过，不存在创建
     */
	protected function isSetUser2($id)
    {
        $result = DB::table('accounts')->where('uid',$id)->first();
        if(empty($result)) {
            $data['uid'] = $id;
            $data['balance'] = 0;
            $data['addtime'] = date('Y-m-d H:i:s');
            DB::table('accounts')->insert($data);
        }

    }
    

}
