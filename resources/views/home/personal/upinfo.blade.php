
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="/homes/css/style.css" />
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
<div class="m_content" style="height: auto;">
<!-- Begin 侧边栏 -->
@include('home.public.sidebar')
<!-- End 侧边栏 -->
    <div class="m_right">
        <div class="m_des">
            <form action="/home/personal/doinfo" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
            <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
              <tr height="45">
                <td width="80" align="right">登录名 &nbsp; &nbsp;</td>
                <td><input type="text" value="{{ $user->uname }}" name="uname" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
              </tr>
              <tr height="45">
                <td width="80" align="right">真实姓名 &nbsp; &nbsp;</td>
                <td><input type="text" value="{{ $users_info->uname }}" name="uuname" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
              </tr>
              <tr height="45">
                <td width="80" align="right">邮箱 &nbsp; &nbsp;</td>
                <td><input type="text" value="{{ $users_info->email }}" name="email" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
              </tr>
              <tr height="45">
                <td width="80" align="right">手机号 &nbsp; &nbsp;</td>
                <td><input type="text" value="{{ $users_info->tel }}" name="tel" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
              </tr>
              <tr height="45">
                <td align="right">头像 &nbsp; &nbsp;</td>
                <td>
                    <input type="hidden" name="old_profile" value="{{ $users_info->profile }}">
                    <input type="file" name="profile" class="small" style="width: 440px;" style="display: block;">
                </td>
                <td>
                  <img style="margin-left: 155px; width: 100px; " src="/uploads/{{ $users_info->profile }}" alt="User Photo">
                </td>
              </tr>
              <tr height="50">
                <td>&nbsp;</td>
                <td><input type="submit" value="确认修改" class="btn_tj" />&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;">修改后建议重新登录*</span></td>
              </tr>
            </table>
            </form>
        </div>
    </div>
</div>
  <!--End 内容 End--> 
<!--Begin Footer Begin -->
@include('home.public.footer')  
<!--End Footer End -->    
</div>
</body>
</html>
