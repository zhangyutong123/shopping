@include('home.public.header')

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
                  <td class="car_th" width="140">属性</td>
                  <td class="car_th" width="150">购买数量</td>
                </tr>
                <tr>
                  <td>
                      <div class="c_s_img"><img src="/homes/images/c_1.jpg" width="73" height="73"></div>
                      Rio 锐澳 水蜜桃味白兰地鸡尾酒（预调酒） 275ml
                  </td>
                  <td align="center">颜色：灰色</td>
                  <td align="center">1</td>
                  <td align="center" style="color:#ff4e00;">￥620.00</td>
                </tr>
              </tbody>
          </table>
            
            <div class="two_t">
              <span class="fr"><a href="#">修改</a></span>收货人信息
            </div>
            <table border="0" class="peo_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td class="p_td" width="160">商品名称</td>
                <td width="395">海贼王</td>
                <td class="p_td" width="160">电子邮件</td>
                <td width="395">12345678@qq.com</td>
              </tr>
              <tr>
                <td class="p_td">详细信息</td>
                <td>四川省成都市武侯区</td>
                <td class="p_td">邮政编码</td>
                <td>6011111</td>
              </tr>
              <tr>
                <td class="p_td">电话</td>
                <td></td>
                <td class="p_td">手机</td>
                <td>18600002222</td>
              </tr>
              <tr>
                <td class="p_td">标志建筑</td>
                <td></td>
                <td class="p_td">最佳送货时间</td>
                <td></td>
              </tr>
            </tbody></table>

            
            <div class="two_t">
              配送方式
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td class="car_th" width="80"></td>
                <td class="car_th" width="200">名称</td>
                <td class="car_th" width="370">订购描述</td>
                <td class="car_th" width="150">费用</td>
              </tr>
              <tr>
                <td align="center"><input type="checkbox" name="ch" checked="checked"></td>
                <td align="center" style="font-size:14px;"><b>申通快递</b></td>
                <td>江、浙、沪地区首重为15元/KG，其他地区18元/KG，续重均为5-6元/KG， 云南地区为8元</td>
                <td align="center">￥15.00</td>
              </tr>
            </tbody>
          </table> 
            
            <div class="two_t">
              支付方式
            </div>
            <ul class="pay">
                <li class="checked">货到付款<div class="ch_img"></div></li>
                <li>支付宝<div class="ch_img"></div></li>
            </ul>
            
            <div class="two_t">
              商品包装
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td class="car_th" width="80"></td>
                <td class="car_th" width="490">名称</td>
                <td class="car_th" width="180">费用</td>
                <td class="car_th" width="180">免费额度</td>
                <td class="car_th" width="180">图片</td>
              </tr>
              <tr>
                <td align="center"><input type="checkbox" name="pack" checked="checked"></td>
                <td><b style="font-size:14px;">不要包装</b></td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center"></td>
              </tr>
              <tr>
                <td align="center"><input type="checkbox" name="pack"></td>
                <td><b style="font-size:14px;">精品包装</b></td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center"><a href="#" style="color:#ff4e00;">查看</a></td>
              </tr>
            </tbody>
          </table> 
            
          <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tbody>
                  <tr>
                    <td align="right">
                        商品总价: <font color="#ff4e00">￥1815.00</font>  + 配送费用: <font color="#ff4e00">￥15.00</font>
                    </td>
                  </tr>
                  <tr height="70">
                    <td align="right">
                      <b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;">￥2899</span></b>
                    </td>
                  </tr>
                  <tr height="70">
                    <td align="right"><a href="#"><img src="/homes/images/btn_sure.gif"></a></td>
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