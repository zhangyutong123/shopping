@include('home.public.header')
<style type="text/css">
	#nav-2014 {
	    margin-bottom: 15px;
	}

	#nav-2014 {
	    margin-top: 10px;
	    height: 33px;
	    border-bottom: 2px solid #f30213;
	    _overflow: hidden;
	}
</style>
<div id="nav-2014">
    <div class="w" style="clear: both;">
        <div class="w-spacer"></div>
        <div id="categorys-2014" class="dorpdown" data-type="default" style="height: auto; left: 320px; position: absolute; font-size: 20px;">
            <div class="dt">
                <a target="_blank" href="#">商品分类</a>
            </div>
        <div class="dd" style="display:none;"></div></div>
        <div id="navitems-2014" style="padding-left: 510px; font-size: 15px;">
            <ul>
                <li style="float: left;">
                	<a target="_blank" href="#">时装</a>
                </li>
                <li style="float: left; margin-left: 50px;">
                	<a target="_blank" href="#">手机</a>
                </li>
                <li style="float: left; margin-left: 50px;">
                	<a target="_blank" href="#">食品</a>
                </li>
            </ul>
            <div class="spacer"></div>
            <ul id="navitems-group2">
                <li style="float: left; margin-left: 50px;">
                    <a target="_blank" href="#">饮品</a>
                </li>
                <li style="float: left; margin-left: 50px;">
                    <a target="_blank" href="#">生鲜</a>
                </li>
                <li style="float: left; margin-left: 50px;">
                    <a target="_blank" href="#">家居</a>
                </li>
            </ul>
        </div>
        <div id="treasure"></div>
        <span class="clr"></span>
    </div>
</div>


<div id="center" style="margin-left: 310px; margin-right: 280px; clear: both; border: 1px solid red;">

	@foreach($datas as $k=>$v)

	<div id="goods" style="width: 180px; height: 260px; border: 1px solid black; margin-right: 5px; float: left;">
		<div id="g-img" style="text-align: center;" >
			<a href=""><img src="/uploads/{{ $v->pic }}" style="width: 150px;"></a>
		</div>
		<div id="g-price" style="margin: 5px; margin-left: 10px; font-size: 22px; color: red; font-weight: 300;">
			<tr>
				<td>¥{{ $v->price }}</td>
			</tr>
		</div>
		<div id="g-name" style="margin: 5px; margin-left: 10px;">
			<tr>
				<td>{{ $v->gname }}</td>
			</tr>
		</div>
	</div>

	@endforeach
	<div style="clear: both;"></div>
</div>



@include('home.public.footer')
