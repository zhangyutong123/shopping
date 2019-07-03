@include('home.public.header')

<script type="text/javascript" src="/homes/js/jquery-1.8.2.min.js"></script>
<div class="i_bg">  
    <div class="content mar_20">
      <img src="/homes/images/img2.jpg">        
    </div>
    
    <!--Begin 第二步：确认订单信息 Begin -->
    <div class="content mar_20">
      <div class="two_bg">
          <div class="two_t">
              <span class="fr"><a href="#">修改</a></span>商品列表
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
                <tbody><tr>
                  <td class="car_th" width="550">商品名称</td>
                  <td class="car_th" width="140">单价</td>
                  <td class="car_th" width="150">购买数量</td>
                  <td class="car_th" width="150">总计</td>
                </tr>
                @foreach($datas_c as $k=>$v)
                <tr>
                  <td>
                      <div class="c_s_img"><img src="/uploads/{{ $v->pic }}" width="73" height="73"></div>
                      {{ $v->gname }}
                  </td>
                  <td align="center">{{ $v->price }}</td>
                  <td align="center">{{ $v->num }}</td>
                  <td align="center" style="color:#ff4e00;">{{ $v->price * $v->num }}</td>
                </tr>
                @endforeach
              </tbody>
          </table>
          <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00; margin-right: 50px;">￥{{ $all }}</b></span>
            
            <div class="two_t">
              <span class="fr"><a href="#">修改</a></span>收货人信息
            </div>
            
            
            @foreach($address as $kk=>$vv)
            <div  style="width: 200px;  display: inline-block;  margin-left: 30px; padding: 0 auto;" >
                  <ul class="pay">
                    <li class="test" id="{{ $vv->id }}" style="height: 140px; text-align: left;" onclick="addr({{ $vv->id }},this)">
                      收件人 : {{ $vv->aname }}<br>
                      收件人电话 : {{ $vv->aphone }}<br>
                      收件人地址 : {{ $vv->province }}
                      <div class="ch_img"></div>
                    </li>
                  </ul>
            </div>
            @endforeach
            <div>
            </div>
            
            <div id="test" class="two_t">
              支付方式
            </div>
            <ul class="pay">
                <li class="test1 checked" id="1" onclick="pay(this)">支付宝<div class="ch_img"></div></li>
                <li class="test1" id="2" onclick="pay(this)">微信支付<div class="ch_img"></div></li>
            </ul>

          <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tbody>
                  <tr height="70">
                    <td align="right">
                      <b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;">￥{{ $all }}</span></b>
                    </td>
                  </tr>
                  <tr height="70">
                    <td align="right"><a id="next" href=""><img src="/homes/images/btn_sure.gif"></a></td>
                  </tr>
              </tbody>
          </table>
        </div>
    </div>
  <!--End 第二步：确认订单信息 End-->
</div>

<!-- footer START -->
@include('home.public.footer')
<!-- footer END -->
<script type="text/javascript">
    function addr(id,obj){
      if($(".test").hasClass("checked")){
        $(".test").removeClass("checked");
        $(obj).addClass("checked");
      }else{
        $(obj).addClass("checked");
      }

      var aid = $(obj).attr("id");
      $("#next").attr("href","/home/cart/next?aid="+aid+"&uid="+{{ $vv->uid }}+"&all="+{{ $all }});
    }

    function pay(obj){
      if($(".test1").hasClass("checked")){
        $(".test1").removeClass("checked");
        $(obj).addClass("checked");
      }else{
        $(obj).addClass("checked");
      }

    }
</script>