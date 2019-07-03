@include('home.public.header')

<div class="i_bg">  
    <div class="content mar_20">
      <img src="/homes/images/img3.jpg">        
    </div>
    
    <!--Begin 第三步：提交订单 Begin -->
    <div class="content mar_20">
        
        <!--Begin 货到付款 Begin -->
      <div class="warning">         
            <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
              <tbody><tr height="35">
                <td style="font-size:18px;">
                  感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00">2015092598275</font>
                </td>
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                  您的应付款金额为: <font color="#ff4e00">￥{{ $all }}</font>
                </td>
              </tr>
              <tr>
                @foreach($datas_a as $k=>$v)
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                  收件人:{{ $v->aname }}
                  收件人地址:{{ $v->province }}
                  收件人电话:{{ $v->aphone }}
                </td>
                @endforeach
              </tr>
              <tr>
                <td style="padding:20px 0 30px 0; font-family:'宋体';">
                  推荐支付:支付宝网站(www.alipay.com) 是国内先进的网上支付平台。<br>
                    支付宝收款接口：在线即可开通，零预付，免年费，单笔阶梯费率，无流量限制。<br>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="btn_u" style="margin:0 auto; padding:0 20px; width:120px;"><a href="#">立即使用支付宝支付</a></div>
                  <a href="/">首页</a> &nbsp; &nbsp; <a href="home/personal/index">用户中心</a>
                </td>
              </tr>
            </tbody></table>          
        </div>
        <!--Begin 货到付款 Begin -->
        
        
    </div>
  <!--End 第三步：提交订单 End--> 
</div>

<!-- footer START -->
@include('home.public.footer')
<!-- footer END -->