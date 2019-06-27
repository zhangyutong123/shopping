<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Captcha;
use Hash;
use DB;

class RegisterController extends Controller
{
	public function index()
	{
		return view('home.register.index');
	}

	//执行邮箱
	public function insert()
	{

	}
	
    // 发送手机号 验证码
    public function sendPhone(Request $request)
    {
    	// 接收手机号
    	$phone = $request->input('phone');
    	
    	$code = rand(1234,4321);
    	// 如果存入到redis中 注意键名覆盖
    	$k = $phone.'_code';

    	session([$k=>$code]);

    	$url = "http://v.juhe.cn/sms/send";
	    $params = array(
	        'key'   => '5a08dc4d30d719c1c69fafd58701ea97', //您申请的APPKEY
	        'mobile'    => $phone, //接受短信的用户手机号码
	        'tpl_id'    => '166968', //您申请的短信模板ID，根据实际情况修改
	        'tpl_value' =>'#code#='.$code, //您设置的模板变量，根据实际情况修改
	    	'dtype'=>'json'
	    );

	    $paramstring = http_build_query($params);
	    $content = self::juheCurl($url, $paramstring);
	    echo $content;
	 

    }



	 /**
	 * 请求接口返回内容
	 * @param  string $url [请求的URL地址]
	 * @param  string $params [请求的参数]
	 * @param  int $ipost [是否采用POST形式]
	 * @return  string
	 */
	function juheCurl($url, $params = false, $ispost = 0)
	{
	    $httpInfo = array();
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	    curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    if ($ispost) {
	        curl_setopt($ch, CURLOPT_POST, true);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	        curl_setopt($ch, CURLOPT_URL, $url);
	    } else {
	        if ($params) {
	            curl_setopt($ch, CURLOPT_URL, $url.'?'.$params);
	        } else {
	            curl_setopt($ch, CURLOPT_URL, $url);
	        }
	    }
	    $response = curl_exec($ch);
	    if ($response === FALSE) {
	        //echo "cURL Error: " . curl_error($ch);
	        return false;
	    }
	    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
	    curl_close($ch);
	    return $response;
	} 

	 // 执行注册 手机号
   public function store(Request $request)
   {	
   		
   		// 验证手机验证码 用户输入
   		$phone = $request->input('phone',0);

   		// 获取发送到手机上验证码
   		$k = $phone.'_code';

   		$phone_code = session($k);

   		$code = $request->input('code',0);


   		if($phone_code != $code){
   			// return back();
   			echo "<script>alert('验证码错误');location.href='/home/register'</script>";
   			exit;
   		}


   		// 接收数据
   		 $uname = $request->input('phone','');
    	 $upass = $request->input('upass','');
    	 $this->validate($request, [
    	 	'phone' => 'required',
            'upass' => 'required|regex:/^[\w]{6,18}$/',
            'repass' => 'required|same:upass',
        ],[
        	'phone.required'=>'手机号必填',
            'upass.regex'=>'密码格式错误',
            'upass.required'=>'密码必填',
            'repass.required'=>'确认密码必填',
            'repass.same'=>'俩次密码不一致',
        ]);
    	 if($uname =="")
    	 {
    	 	echo "<script>alert('shoujihaobenengweikong');location.href='/home/register'</script>";
    	 }
         $rree = DB::table('users')->where('uname'=='$uname');
        if($rree){
        	echo "<script>alert('该手机号已经被注册过');location.href='/home/register'</script>";
        	exit;
        }
   		// 压入到数据库
   		 $data['uname'] = $request->input('phone','');
         $data['upass'] = Hash::make($request->input('upass',''));
         $res = DB::table('users')->insert($data);
         if($res){
          	return redirect('home/index/login')->with('success','注册成功');
        }else{
           return back()->with('error','注册失败请从新注册');
        }
   }


   //邮箱注册
   public function index()
   {

   }
   
}
