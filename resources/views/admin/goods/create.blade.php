@extends('admin.public.index')

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>商品添加</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/goods" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">商品名称</label>
        				<div class="mws-form-item">
        					<input type="text" name="gname" class="small">
        				</div>
        			</div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品价格</label>
                        <div class="mws-form-item">
                            <input type="text" name="price" class="small">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品品牌</label>
                        <div class="mws-form-item">
                            <input type="text" name="brand" class="small">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品状态</label>
                        <div class="mws-form-item">
                            <select class="small" name="status">
                                <option value="0">下架</option>
                                <option value="1">上架</option>
                            </select>
                        </div>
                    </div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">商品类</label>
        				<div class="mws-form-item">
        					<select class="small" name="cid">
                                @foreach($cates as $k=>$v)
                                @if(substr_count($v->path,',') > 0)
                                <option value="{{ $v->id }}">{{ $v->cname }}</option>
                                @endif
                                @endforeach
        					</select>
        				</div>
        			</div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品图片</label>
                        <div class="mws-form-item">
                            <input type="file" name="pic">
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