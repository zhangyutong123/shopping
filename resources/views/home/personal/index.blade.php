
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
                          <td width="150"><img src="/homes/images/user.jpg" width="90" height="90"></td>
                          <td>
                              <div class="m_user">Welcom to our shopping!</div>
                              <p>登录名: tong</p>
                              <p>登录时间: 2015-09-28 18:19:47&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span ><a href="" style="color: orange;">修改信息</a></span></p>
                          </td>
                      </tr>
                  </tbody>
              </table>  
            </div>  
             <div class="mem_t" style="margin-left: 180px; color: grey;"><h3>账号信息</h3></div>
            <table border="0" class="mon_tab" style="width:600px; margin-bottom:20px; margin-left: 170px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="40%">用户ID：<span style="color:#555555;">12345678</span></td>
                <td width="60%">邀请人：<span style="color:#555555;">邀请人姓名</span></td>
              </tr>
              <tr>
                <td>电&nbsp; &nbsp; 话：<span style="color:#555555;">1861111111</span></td>
                <td>邮&nbsp; &nbsp; 箱：<span style="color:#555555;">12345678@qq.com</span></td>
              </tr>
              <tr>
                <td>身份证号：<span style="color:#555555;">522555123456789</span></td>
                <td>注册时间：<span style="color:#555555;">2015-10-10</span></td>
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
