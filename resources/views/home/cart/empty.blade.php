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
    <div>
        <span style="text-align: center; font-size: 24px; margin-left: 500px; padding-top: 50px;">购物车中什么都没有,赶紧去 <a href="">商城</a> 看看吧</span>
    </div>
    
    
    <!--Begin 弹出层-删除商品 Begin-->
    <div id="fade" class="black_overlay"></div>

    
    <!--End Footer End -->    
</div>

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>

@include('home.public.footer')
<!-- footer END -->