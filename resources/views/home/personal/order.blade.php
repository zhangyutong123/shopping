
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
<div class="m_content" style="height: auto;">
<!-- Begin 侧边栏 -->
@include('home.public.sidebar')
<!-- End 侧边栏 -->
    <div class="m_right">
      <p></p>
        <table border="0" class="order_tab" style="width:930px; text-align:center; margin-top: 50px; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tr>                                                                                                                                                    
                <td width="20%">订单号</td>
                <td width="25%">商品名称</td>
                <td width="15%">订单单价</td>
                <td width="25%">订单状态</td>
                <td width="15%">操作</td>
              </tr>
              @foreach($data as $k=>$v)
              @foreach($goods[$v->id] as $kk=>$vv)
              <tr>
                <td><font color="#ff4e00">{{ $v->onumber }}</font></td>
                <td>{{ $vv->gname }}</td>
                <td>￥{{ $vv->price }}</td>
                @if($v->status == 0)
                <td>未发货</td>
                @elseif($v->status == 1)
                <td>已发货</td>
                @else
                <td>已收货</td>
                @endif
                <td><a>删除订单</a></td>
              </tr>
              @endforeach
              @endforeach
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
