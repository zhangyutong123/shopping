@include('home.public.header')

<link href="/homes/announce/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/homes/announce/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
<div class="am-g am-g-fixed blog-g-fixed bloglist" style="margin-top: 50px;">
  <div class="am-u-md-9"  style=" width: 800px; margin-left: 100px;">
    <article class="blog-main">
      <!-- 公告标题 start -->
      <h3 class="am-article-title blog-title">
        {{ $announces_data->aname }}
      </h3>
      <!-- 公告标题 end -->
      <h4 class="am-article-meta blog-meta">
        <!-- 公告标签和时间 start -->
      	<span style="border: 1px solid orange; padding: 5px; color: white; background-color: orange;">{{ $announces_data->alabel }}</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      	<span style="float: right;">{{ $announces_data->updated_at }}</span>
        <!-- 公告标题和时间 end -->
      </h4>
      <div class="am-g blog-content">
        <!-- 公告内容 start -->
        <div class="am-u-sm-12">
          {!! $announces_data->acontent !!}
        </div>
        <!-- 公告内容 end -->
      </div>
    </article>
    <hr class="am-article-divider blog-hr">
  </div>
</div>

@include('home.public.footer')