@extends('admin.public.index')

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>特价商品添加</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/goods_cheap" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">特价商品名称</label>
        				<div class="mws-form-item">
        					<input type="text" name="gcname" class="small">
        				</div>
        			</div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">特价商品价格</label>
                        <div class="mws-form-item">
                            <input type="text" name="gcprice" class="small">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">特价商品原价</label>
                        <div class="mws-form-item">
                            <input type="text" name="gprice" class="small">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">特价商品尺码</label>
                        <div class="mws-form-item">
                            <input type="text" name="gcsize" class="small">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">特价商品图片</label>
                        <div class="mws-form-item">
                            <input type="file" name="gcprofile">
                        </div>
                    </div>
        		<div class="mws-button-row">
        			<input type="submit" value="添加" class="btn btn-danger">
        			<input type="reset" value="重置" class="btn ">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection