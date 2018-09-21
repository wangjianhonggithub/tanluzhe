<?php

/**
 * @Author: Administrator
 * @Date:   2018-04-10 14:25:00
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-04-11 11:06:59
 */
//引入邮件类
namespace App\Service;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Cookie;
//引入自动加载类
// require 'vendor/autoload.php';
/**
* phpmailer 邮件类
*/
class CarLosMailer
{
	/**
	 * 普通的邮箱验证码
	 * @Author   CarLos(翟)
	 * @DateTime 2018-04-10
	 * @Email    carlos0608@163.com
	 */
	public static function SendEmail($toMail,$code,$nickname)
	{
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		try {
		    //Server settings
		    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = env('EMAIL_HOST');                      // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = env('EMAIL_USERNAME');              // SMTP 用户名
		    $mail->Password = env('EMAIL_PASSWORD');              // SMTP SMTP授权密码
		    // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = env('EMAIL_PORT');                                    // TCP port to connect to
		    $mail->CharSet = "utf8";
		    //Recipients
		    $mail->setFrom(env('EMAIL_USERNAME'),env('EMAIL_FORMNAME'));
		    $mail->addAddress($toMail);                                       // 添加收件人
		    // $mail->addAddress('ellen@example.com');                        // 可选名称
		    // $mail->addReplyTo('info@example.com', 'Information');          // 添加回复
		    // $mail->addCC('cc@example.com');                                // 添加抄送
		    // $mail->addBCC('bcc@example.com');
		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = '探路者网络账户验证';
		    $mail->Body    = $nickname.'，您好！<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们收到了来自您的密码找回请求。本次验证码为:<b style="color:red">'.$code.'</b>，
请在10分钟内输入验证码完成本次安全操作!';
		    $mail->send();
		    Cookie::queue('EmailCode',$code,600);
		    return json_encode(['code'=>1,'message'=>'邮件发送成功']);
		} catch (Exception $e) {
		    return json_encode(['code'=>0,'message'=>'邮件发送失败,失败的原因是'.$mail->ErrorInfo]);
		}
	}
}