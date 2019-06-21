@extends('admin.public.index')

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>商品修改</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/goods/{{ $goods->id }}" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
                {{ method_field('PUT') }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">商品名称</label>
        				<div class="mws-form-item">
        					<input type="text" name="gname" value="{{ $goods->gname }}" class="small">
        				</div>
        			</div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品价格</label>
                        <div class="mws-form-item">
                            <input type="text" name="price" value="{{ $goods->price }}" class="small">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品品牌</label>
                        <div class="mws-form-item">
                            <input type="text" name="brand" value="{{ $goods->brand }}" class="small">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品状态</label>
                        <div class="mws-form-item">
                            <select class="small" name="status">
                                @if($goods->status == 0)
                                <option value="0" selected>下架</option>
                                @else
                                <option value="1">上架</option>
                                @endif
                            </select>
                        </div>
                    </div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">商品类</label>
        				<div class="mws-form-item">
        					<select class="small" name="cid">
                                @foreach($cates as $k=>$v)
                                @if(substr_count($v->path,',') > 1)
                                <option value="{{ $v->id }}" {{ $v->id == $cid ? 'selected' : '' }}>{{ $v->cname }}</option>
                                @endif
                                @endforeach
        					</select>
        				</div>
        			</div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品图片</label>
                        <img src="/uploads/{{ $goods->pic }}" style="width: 150px;">
                        <br>
                        <input type="hidden" name="pic_path" value="{{ $goods->pic }}">
                        <div class="mws-form-item" style="width: 740px;">
                            <input type="file" name="pic" >
                        </div>
                    </div>
        		<div class="mws-button-row">
        			<input type="submit" value="修改" class="btn btn-danger">
        			<input type="reset" value="重置" class="btn ">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection