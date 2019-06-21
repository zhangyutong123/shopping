@extends('admin.public.index')


@section('content')

	@if (count($errors) > 0)
	    <div class="mws-form-message error">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>轮播图修改</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/orders/{{ $orders->id }}" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		{{ method_field('PUT') }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">收货人姓名</label>
        				<div class="mws-form-item">
        					<input type="text" name="oname" class="small" value="{{ $orders->oname }}">
        				</div>
        			</div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">收货人电话</label>
                        <div class="mws-form-item">
                            <input type="text" name="tel" class="small" value="{{ $orders->tel }}">
                        </div>
                    </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label">收货人地址</label>
                        <div class="mws-form-item">
                            <input type="text" name="aid" class="small" value="{{ $orders->aid }}">
                        </div>
                    </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item">
                            <input type="text" name="status" class="small" value="{{ $orders->status }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品id</label>
                        <div class="mws-form-item">
                            <input readonly type="text" name="gid" class="small" value="{{ $orders->gid }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">数量</label>
                        <div class="mws-form-item">
                            <input readonly type="text" name="num" class="small" value="{{ $orders->num }}">
                        </div>
                    </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label">订单号</label>
                        <div class="mws-form-item">
                            <input readonly type="text" name="onumber" class="small" value="{{ $orders->onumber }}">
                        </div>
                    </div>
                   
                    </div>
			         	

        		</div>
        		<div class="mws-button-row">
        			<input type="submit" value="提交" class="btn btn-danger">
        			<input type="reset" value="重置" class="btn ">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection