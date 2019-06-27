
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
        
    
<title>收货地址</title>
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
        <p></p>
            <div class="mem_tit">
              收货地址
              <span style="float: right; margin-top: 10px;">
                <a href="/home/personal/addaddress" >
                  <button>添加新地址</button>
                </a>
              </span>
            </div>

      @foreach($address_data as $k=>$v)
      @if($v->uid == session('home_userinfo')->id)
      <div class="address">

        <!-- 删除操作 start -->
          <div class="a_close">
            <a href="/home/personal/del?id={{ $v->id }}" onclick="return confirm('确定要删除么?')">
              <img src="/homes/images/a_close.png" />
            </a>
          </div>
        <!-- 删除操作 end -->

              <table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2" style="font-size:14px; color:#ff4e00;">{{ session('home_userinfo')->uname }}</td>
                  </tr>
                  <tr>
                    <td align="right" width="80">收货人姓名：</td>
                    <td>{{ $v->aname }}</td>
                  </tr>
                  <tr>
                    <td align="right">收货地址：</td>
                    <td>{{ $v->province }}</td>
                  </tr>
                  <tr>
                    <td align="right">手机：</td>
                    <td>{{ $v->aphone }}</td>
                  </tr>
                  <tr>
                    <td align="right">邮编：</td>
                    <td>{{ $v->code }}</td>
                  </tr>
                </table>
                <p align="right">
                  <a href="/home/personal/upaddress?id={{ $v->id }}" style="color:#ff4e00;">编辑</a>&nbsp; &nbsp; &nbsp; &nbsp; 
                </p>
                </div>
                @endif
               @endforeach
    </div>
</div>
  <!--End 内容 End--> 
<!--Begin Footer Begin -->
@include('home.public.footer')  
<!--End Footer End -->    
</div>
</body>
</html>
