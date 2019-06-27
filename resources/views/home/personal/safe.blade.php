
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
		<div class="m_right" style="height: 500px;">
        <div class="m_des" style="padding-bottom: 0px; border-bottom: 0px;">
            <form action="/home/personal/dosafe" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
            <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
              <tr height="45">
                <td width="80" align="right">原密码 &nbsp; &nbsp;</td>
                <td><input type="password" value="" name="oldpass" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
              </tr>
              <tr height="45">
                <td align="right">新密码 &nbsp; &nbsp;</td>
                <td><input type="password" value="" name="upass" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
              </tr>
              <tr height="45">
                <td align="right">确认密码 &nbsp; &nbsp;</td>
                <td><input type="password" value="" name="repass" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>
              </tr>
              
                  @if (count($errors) > 0)
                  <tr height="45">
                    <td colspan="2" >
                  @foreach ($errors->all() as $error)
                      <p style="color: red">{{ $error }}!</p>
                  @endforeach
                  </td>
                  </tr>
                  @endif
              
              <tr height="50">
                <td>&nbsp;</td>
                <td><input type="submit" value="确认修改" class="btn_tj" /></td>
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
