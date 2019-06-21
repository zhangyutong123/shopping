
<!--End Header End--> 
<!--Begin Menu Begin-->
<div class="menu_bg">
    <div class="menu">
        <!--Begin 商品分类详情 Begin-->    
        <!--Begin 商品分类详情 Begin-->    
        <div class="nav">
            <div class="nav_t">全部商品分类</div>
            <div class="leftNav">
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
                            </div>
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
        <div class="m_ad"></div>
    </div>
</div>
<!--End Menu End--> 

