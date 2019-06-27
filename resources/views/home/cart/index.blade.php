@include('home.public.header')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="/homes/css/style.css" />
    <!--[if IE 6]>
    <script src="/homes/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->
    
    <script type="text/javascript" src="/homes/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/homes/js/menu.js"></script>    
                
    <script type="text/javascript" src="/homes/js/n_nav.js"></script>   
    
    <script type="text/javascript" src="/homes/js/num.js">
        var jq = jQuery.noConflict();
    </script>     
    
    <script type="text/javascript" src="/homes/js/shade.js"></script>
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->

<!--End Header End--> 
<!--Begin Menu Begin-->
<div class="menu_bg">
    <div class="menu">
        <!--Begin 商品分类详情 Begin-->    
        <div class="nav">
            <div class="nav_t">全部商品分类</div>
            <div class="leftNav none">
                <ul>
                    @foreach($cates_data as $k=>$v)
                    @if(substr_count($v->path,',') < 1) 
                    <li>
                        <div class="fj">
                            <span class="n_img"><span></span><img src="/homes/images/nav1.png" /></span>
                            <span class="fl">{{ $v->cname }}</span>
                        </div>
                        
                        <div class="zj">
                            <div class="zj_l">
                                @foreach($cates_data as $kk=>$vv)
                                @if($vv->pid == $v->id)
                                <div class="zj_l_c">
                                    <h2>{{ $vv->cname }}</h2>
                                    @foreach($cates_data as $kkk=>$vvv)
                                    @if($vvv->pid == $vv->id)
                                    <a href="/home/cates/{{ $vvv->id }}?id={{ $vvv->id }}">{{ $vvv->cname }}</a>|
                                    @endif
                                    @endforeach
                                </div>
                                @endif
                                @endforeach
                            <div class="zj_r">
                                <a href="#"><img src="/homes/images/n_img1.jpg" width="236" height="200" /></a>
                                <a href="#"><img src="/homes/images/n_img2.jpg" width="236" height="200" /></a>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach 
                </ul>            
            </div>
        </div> 
        <!--End 商品分类详情 End-->                                                     
        <ul class="menu_r">                                                                                                                                               
            <li><a href="Index.html">首页</a></li>
            <li><a href="Food.html">美食</a></li>
            <li><a href="Fresh.html">生鲜</a></li>
            <li><a href="HomeDecoration.html">家居</a></li>
            <li><a href="SuitDress.html">女装</a></li>
            <li><a href="MakeUp.html">美妆</a></li>
            <li><a href="Digital.html">数码</a></li>
            <li><a href="GroupBuying.html">团购</a></li>
        </ul>
        <div class="m_ad">中秋送好礼！</div>
    </div>
</div>
<!--End Menu End--> 
<div class="i_bg">  
    <div class="content mar_20">
        <img src="/homes/images/img1.jpg" />        
    </div>
    
    <!--Begin 第一步：查看购物车 Begin -->
    <div class="content mar_20">
        <table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="20"></td>
            <td class="car_th" width="490">商品名称</td>
            <td class="car_th" width="140">单价</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">共计</td>
            <td class="car_th" width="150">操作</td>
          </tr>
          @foreach($data as $k=>$v)
          @foreach($datas_c as $kk=>$vv)
          <tr>
            <td>
              <input type="checkbox" name="clear"/>
            </td>
            <td>
                <div class="c_s_img"><img src="/uploads/{{ $v->pic }}" width="73" height="73" /></div>
                {{ $v->pname }}
            </td>
            <td align="center">{{ $v->price }}</td>
            <!-- <td align="center">
                <div class="c_num">
                    <input type="button" value="" onclick="jianUpdate1(jq(this));" class="car_btn_1" />
                    <input type="text" value="{{ $vv->num }}" name="" class="car_ipt" />  
                    <input type="button" value="" onclick="addUpdate1(jq(this));" class="car_btn_2" />
                </div>
            </td> -->
            <td align="center">
              <a href="/home/cart/{{ $v->id }}/edit">-</a>
                {{ $vv->num }}
              <a href="/home/cart/{{ $v->id }}">+</a>
            </td>
            <td align="center" style="color:#ff4e00;">{{ $v->price * $vv->num }}</td>
            <td align="center"><a href="/home/cart/create?id={{ $v->id }}">删除</a>&nbsp; &nbsp;<a href="#">加入收藏</a></td>
          </tr>
          @endforeach
          @endforeach


          <!-- <tr class="car_tr">
            <td>
              <input type="checkbox" name="clear"/>
            </td>
            <td>
                <div class="c_s_img"><img src="/homes/images/c_4.jpg" width="73" height="73" /></div>
                Rio 锐澳 水蜜桃味白兰地鸡尾酒（预调酒） 275ml
            </td>
            <td align="center">颜色：灰色</td>
            <td align="center">
                <div class="c_num">
                    <input type="button" value="" onclick="jianUpdate1(jq(this));" class="car_btn_1" />
                    <input type="text" value="1" name="" class="car_ipt" />  
                    <input type="button" value="" onclick="addUpdate1(jq(this));" class="car_btn_2" />
                </div>
            </td>
            <td align="center" style="color:#ff4e00;">￥620.00</td>
            <td align="center"><a href="#">删除</a>&nbsp; &nbsp;<a href="#">加入收藏</a></td>
          </tr> -->
          <tr height="70">
            <td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
                <label class="r_txt"><a href="/home/car/clear?uid={{ $uid }}">清空购物车</a></label>
                <label class="r_txt"><a href="">全选</a></label>
                <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00;">￥{{ $all }}</b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
            <td colspan="6" align="right">
                <a href="/"><img src="/homes/images/buy1.gif" /></a>&nbsp; &nbsp; <a href="/home/car/confirm?uid={{ $uid }}"><img src="/homes/images/buy2.gif" /></a>
            </td>
          </tr>
        </table>
        
    </div>
    <!--End 第一步：查看购物车 End--> 
    
    
    <!--Begin 弹出层-删除商品 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="/homes/images/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td>您确定要把该商品移除购物车吗？</td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td><a href="#" class="b_sure">确定</a><a href="#" class="b_buy">取消</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-删除商品 End-->
    
    <!--End Footer End -->    
</div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>

@include('home.public.footer')
<!-- footer END -->