
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="/homes/css/style.css" />
    <!--[if IE 6]>
    <script src="js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->
        
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>    
        
	<script type="text/javascript" src="js/select.js"></script>
        
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
@include('home.public.header')

<!--End Header End--> 
<div class="i_bg bg_color">
<!--Begin 内容 Begin -->
<div class="m_content" style="height: 500px;">
<!-- Begin 侧边栏 -->
@include('home.public.sidebar')
<!-- End 侧边栏 -->
		<div class="m_right">
        <div class="m_des">
              <table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                  <tbody>
                      <tr valign="top">
                          <td width="150"><img src="/uploads/{{ $users_info->profile }}" width="90" height="90"></td>
                          <td>
                              <div class="m_user">Welcom to our shopping!</div>
                              <p>登录名: {{ session('home_userinfo')->uname }}</p>
                              <p>用户真实姓名: {{ $users_info->uname }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span ><a href="/home/personal/upinfo" style="color: orange;">修改信息</a></span></p>
                          </td>
                      </tr>
                  </tbody>
              </table>  
            </div>  
             <div class="mem_t" style="margin-left: 180px; color: grey;"><h3>账号信息</h3></div>
             <br /> 
            <table border="0" class="mon_tab" style="width:600px; margin-bottom:20px; margin-left: 170px;" cellspacing="0" cellpadding="0">
              <tr>
                <td>电&nbsp; &nbsp; 话：<span style="color:#555555;">{{ $users_info->tel }}</span></td>
                <td>邮&nbsp; &nbsp; 箱：<span style="color:#555555;">{{ $users_info->email }}</span></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td>注册时间 :<span style="color:#555555;">{{ $users_info->created_at }}</span></td>
                <td>修改时间 :<span style="color:#555555;">{{ $users_info->updated_at }}</span></td>
              </tr>
            </table>
    </div>
</div>
	<!--End 内容 End--> 
<!--Begin Footer Begin -->
@include('home.public.footer')  
<!--End Footer End -->    
</div>
</body>
</html>
