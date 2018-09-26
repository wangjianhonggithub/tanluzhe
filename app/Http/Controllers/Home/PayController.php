<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;

class PayController extends Controller
{
    protected $config = [
        'app_id' => '2018063060513048',
        'notify_url' => 'http://www.lignrue.shop/pay/notify',
        'return_url' => 'http://www.lignrue.shop/pay/collback?',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAv/bfa/NikOeB7EnQoHzDtaBKZyr6XDOlr3ucFwzahZHznahu2OCga+eopKKBdj25kANqNiEP86p3/k9R2MQJsAsdUClxkCvFbnu7ZnsKvYxI/UrytqGB5kO7CRrTQ84UUMeso301xI1L4If+JutDXMl9dKvPkS2vhtNpYYJIrUaAMGu4KCaPUltQqAITdXPBj6+Ie/16FScXptbI1HPfu5QXMPut9F3lFdLeHE60E6ywjj3jaTPEtHzFNEaE48qO6Zx94OQBUs5aAlJ4sYVimzh/9ZUrwjcV6qiXLguX4Uc5TtvyUOA9kCEIihYgWfnD78rNbJrXWwyM6759767TFQIDAQAB',
        // 加密方式： **RSA2**
        'private_key' => "MIIEowIBAAKCAQEA5mBsT1KJQIqax1m1mX2YjaY4nxyyCuapbrjup3xdJ/1B7Ol0PMCcSoJV2c93cTkUmNx3rjMnafX0DaywjTzPoqLEnrvFYCN0jveoQZFmP+3TzOIpW/wcDSxVYzquroLfOujXhDGvFCYCK9bOKSSDNVA1Krg1g5ZjN5DH7i5BCUNGXjUdVVQN5HE0cV4mavYgXSz885E2Hu66yxldqRnorAenGng/VZh++lT9qAG3/YQeIhhfs69QeuSDcR7wV2+94lq6eWLg8j82i1gqTf2owN9ZKZp1zlll8qa9jbGaBwEpM2AfAIiTHrlOCeofz/PG2MvPdevcJprjlufIv+m0HQIDAQABAoIBAAa8Mu5uv0x/wN6rJMAEB/28KlOchygCblmqVm/XFvIgWVkPyjIsf2U+QjxH8HoC7TM63tTc8f4LDsOHlPHMIVXj5FOvsamJ39J+MxEXqyGbVmHbCtKBoGBSN3zbLlgzw0r5m7NlsHSqV83oTcauJpfcbHF/STE7qFLrjKzN9WDL5ICO1aVJ+KoXP+iL6PsiC/EYVW816NyCUKK0ZCm55IAkAPDxBIDYNc3opUo/+1a7UIndM+4tyYOD5l1qySEaNwTB4GEFffmY3DRoD+zOGxJ+e9el+V0B5N0yIdlEWiIVv9A99V+BIPDkDk9jh3wNwKfiT5oufBuD+Y4ceWGIK5ECgYEA/Py3azLSosRhaQI4ApJaAiE234xSrjKcPrNMogEJYZgNqhroQMCgwEFsxS2NrcniH0b/gkTUXNpCa97kV402ePQTrvT4+g+XMAaHjJKm2OlzjWO4fT38xt/7q7fT3Pec9b87wbkHIcjeDz3AAecDioshBiZU2FYcsQUAdDHbRMsCgYEA6R7GFg9RDqhba0LQbKijuValnCDI8Wuhbg+lVdQmJHfZxuSUE7YCFHwv8YtiuawQMGbjtwkUtobKdXU3DMejm6YB8xR23NpCxjdI0oaxJld6+5ab0sEYfyCyrflhSuW4Y9KAm503oSpu2//Cla6Et4q7bEBYtpY6LgQBDTSYtbcCgYB5lddtHMLg2TLbreZPThkWFvJxY9ZExCwVckStQ4RHtDU1ALOIk0tuusLUzPzffjw/vfaEnCHX8kmj4D6r2UFJxjxDhJa4T4/g0/KHW9/2NdSEKl37SzRWPEWPFM0s0JBOBzdn9k34LbqTZqEGCQnJpu4bL4btZg1qAjZioad5GwKBgQCIOp2TYpwBrszNn5vhA6O5uTLKTDZhLn6FrMr3nyQzB37SRd1qr2ADzJbP1p541l4Xiujjm4DpMVe60Ca9ZyTq3lYhUQItCbcf0krSDDgVqeWKhHbG8GR6VgdUt3jtpdTdMLRLO9K4ce2azplNk1CnWYExP2EYQi35mglrSCM9fQKBgD1Rk/C/wSRF5YkK8pjMREDAM3MKqTgUugm5rOksVDukshpoYlWlKZDVnAqM+n+GF6WxpMKT8WaGPFhnujsRLB/E559dX1n9XEKz7xA1Lm6gaoMFao0etugm5d56CoSDsjkpiUkdp/2CX6Q1snVbpOZHMtAlK1kb92Cgp+kgSFRA",
        'log' => [ // optional
            'file' => './logs/alipay.log',
            'level' => 'debug',
            'type' => 'single', // optional, 可选 daily.
            'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
        ],
//        'mode' => 'dev', // optional,设置此参数，将进入沙箱模式
    ];

    public function wxPay()
    {
        
    }

    /**
     * 支付完成，返回的回调地址
     */
    public function collback(Request $request)
    {
        $data = $request->all();
        $res = DB::table('order_alipay')->insert($data);
        $o = OrderController::status($request,0,1,1);
        dump($o);
    }

    /**
     * 支付
     * @param array $order
     * @return mixed
     */
    public function toPay($order=array(),$res=0)
    {
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
        $alipay = Pay::alipay($this->config);

        try{
            $newData['orderStatus'] = 0;
            DB::table('order')->where('OrderNo','=',$request->out_trade_no)->update($newData);
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
