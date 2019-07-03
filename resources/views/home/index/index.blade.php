@include('home.public.header')
@include('home.public.index')

<div class="i_bg bg_color">
	<div class="i_ban_bg">
		<!-- 轮播图 start -->
    	<div class="banner">    	
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    @foreach($banners_data as $k=>$v)
                    <li><img src="/uploads/{{ $v->url }}" width="740" height="401" /></li>
                    @endforeach
                </ul>	
                <div class="op_btns clearfix">
                    <a href="#" class="op_btn op_prev"><span></span></a>
                    <a href="#" class="op_btn op_next"><span></span></a>
                </div>        
            </div>
        </div>
        <!-- 轮播图 end -->

        <script type="text/javascript">
        //var jq = jQuery.noConflict();
        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script>
        <!--End Banner End-->
        <div class="inews">
        	<div class="news_t">
            	公告栏
            </div>
            <ul>
                @foreach($announces_data as $k=>$v)

            	<li>
                    <span class="hides">[ {{ $v->alabel }} ]</span>&nbsp;
                    <a href="/home/index/show?id={{ $v->id }}" class="hides">{{ $v->aname }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!--Begin 热门商品 Begin-->
    <div class="content mar_10">
        <div class="hot_pro" style="width: 1200px;">        	
        	<div id="featureContainer" style="width: 1200px;">
                <div id="feature" style="width: 1200px;">
                    <div id="block" style="width: 1200px; margin: 0px;" >
                        <div id="botton-scroll1" style="width: 1200px;">
                            <ul class="featureUL">
                                @foreach($goods_hot as $k=>$v)
                                <li class="featureBox">
                                    <div class="box">
                                    	<div class="h_icon"><img src="/homes/images/hot.png" width="50" height="50" /></div>
                                        <div class="imgbg">
                                        	<a href="/home/goods?id={{ $v->id }}&cid={{ $v->cid }}"><img src="/uploads/{{ $v->pic }}" width="160" height="136" /></a>
                                        </div>                                        
                                        <div class="name">
                                        	<a href="#">
                                            <h2>{{ $v->brand }}</h2>
                                            {{ $v->gname }}
                                            </a>
                                        </div>
                                        <div class="price">
                                            <font>￥<span>{{ $v->price }}</span></font>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Begin 特价商品 Begin-->
    <div class="i_t mar_10">
    	<span class="fl">特价商品</span>
    </div>
    <div class="content">
    	<div class="i_sell">
            <div id="imgPlay">
                <ul class="imgs" id="actor">
                    <li><a href="#"><img src="/homes/images/tm_r.jpg" width="211" height="357" /></a></li>
                    <li><a href="#"><img src="/homes/images/tm_r.jpg" width="211" height="357" /></a></li>
                    <li><a href="#"><img src="/homes/images/tm_r.jpg" width="211" height="357" /></a></li>
                </ul>
                <div class="previ">上一张</div>
                <div class="nexti">下一张</div>
            </div>        
        </div>
        <div class="sell_right">
        	<div class="sell_1">
            	<div class="s_img"><a href="#"><img src="/homes/images/tm_1.jpg" width="185" height="155" /></a></div>
            	<div class="s_price">￥<span>89</span></div>
                <div class="s_name">
                	<h2><a href="#">沙宣洗发水</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_2">
            	<div class="s_img"><a href="#"><img src="/homes/images/tm_2.jpg" width="185" height="155" /></a></div>
            	<div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                	<h2><a href="#">德芙巧克力</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_b1">
            	<div class="sb_img"><a href="#"><img src="/homes/images/tm_b1.jpg" width="242" height="356" /></a></div>
            	<div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                	<h2><a href="#">东北大米</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_3">
            	<div class="s_img"><a href="#"><img src="/homes/images/tm_3.jpg" width="185" height="155" /></a></div>
            	<div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                	<h2><a href="#">迪奥香水</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_4">
            	<div class="s_img"><a href="#"><img src="/homes/images/tm_4.jpg" width="185" height="155" /></a></div>
            	<div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                	<h2><a href="#">美妆</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
            <div class="sell_b2">
            	<div class="sb_img"><a href="#"><img src="/homes/images/tm_b2.jpg" width="242" height="356" /></a></div>
            	<div class="s_price">￥<span>289</span></div>
                <div class="s_name">
                	<h2><a href="#">美妆</a></h2>
                    倒计时：<span>1200</span> 时 <span>30</span> 分 <span>28</span> 秒
                </div>
            </div>
        </div>
    </div>
    <!--End 特价商品 End-->
        
    <!-- 广告 start -->
    <div class="content mar_20">
        <img src="/uploads/{{ $advs_data->url }}" width="1200" height="110" />
    </div>
    <!-- 广告 end -->
    
	<!-- 推荐商品列表部分 start-->
    {{ $i = 1 }}
    @foreach($cates_data as $k=>$v)
    @if($v->pid == 0)
    <div class="i_t mar_10">
    	<span class="floor_num">{{ $i++ }}F</span>
    	<span class="fl">{{ $v->cname }}</span>        
    </div>
    <div class="content">
        <!-- 左侧大图 -->
    	<div class="fresh_left">
        	<div class="fre_ban">
            	<div id="imgPlay1">
                    <ul class="imgs" id="actor1">
                        <li><img src="/homes/images/fre_r.jpg" width="211" height="286" /></li>
                    </ul>
                </div>   
            </div>
            <!-- 文字部分 -->
            <div class="fresh_txt">
            	<div class="fresh_txt_c">
                     @foreach($cates_data as $kk=>$vv)
                     @if($vv->pid == $v->id)
                     @foreach($cates_data as $kkk=>$vvv)
                     @if($vvv->pid == $vv->id)
                     <a href="/home/cates/{{ $vvv->id }}?id={{ $vvv->id }}">{{ $vvv->cname }}</a>
                     @endif
                     @endforeach
                     @endif
                     @endforeach
                </div>
            </div>
        </div>
        <div class="fresh_mid">
        	<ul>
                @foreach($goods as $g=>$gg)
            	<li>
                	<div class="name"><a href="#">{{ $gg->gname }}</a></div>
                    <div class="price">
                    	<font>￥<span>{{ $gg->price }}</span></font>&nbsp;{{ $gg->brand }}
                    </div>
                    <div class="img"><a href="/home/goods?id={{ $gg->id }}&cid={{ $gg->cid }}"><img src="/uploads/{{ $gg->pic }}" width="185" height="155" /></a></div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>   
    @endif
    @endforeach
    <!-- 推荐商品列表部分 end -->

    <!--Begin 猜你喜欢 Begin-->
    <div class="i_t mar_10">
        <span class="fl">猜你喜欢</span>
    </div>  
    <div class="like">        	
        <div id="featureContainer1">
            <div id="feature1">
                <div id="block1">
                    <div id="botton-scroll1" style="width: 1200px;">
                        <ul class="featureUL">
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/homes/images/hot1.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>德国进口</h2>
                                        德亚全脂纯牛奶200ml*48盒
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>189</span></font> &nbsp; 26R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/homes/images/hot2.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>iphone 6S</h2>
                                        Apple/苹果 iPhone 6s Plus公开版
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>5288</span></font> &nbsp; 25R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/homes/images/hot3.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>倩碧特惠组合套装</h2>
                                        倩碧补水组合套装8折促销
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>368</span></font> &nbsp; 18R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/homes/images/hot4.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>品利特级橄榄油</h2>
                                        750ml*4瓶装组合 西班牙原装进口
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>280</span></font> &nbsp; 30R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="/homes/images/hot4.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>品利特级橄榄油</h2>
                                        750ml*4瓶装组合 西班牙原装进口
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>280</span></font> &nbsp; 30R
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="l_prev" href="javascript:void();">Previous</a>
                <a class="l_next" href="javascript:void();">Next</a>
            </div>
        </div>
    </div>
    <!--End 猜你喜欢 End-->

@include('home.public.footer')
   
