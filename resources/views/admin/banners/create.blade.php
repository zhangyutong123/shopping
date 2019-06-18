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
        	<span>轮播图添加</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/banners" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">轮播标题</label>
        				<div class="mws-form-item">
        					<input type="text" name="bname" class="small" value="{{ old('bname') }}">
        				</div>
        			</div>

					<div class="mws-form-row" style="width: 450px;">
        				<label class="mws-form-label">轮播图片</label>
        				<div class="mws-form-item" style="width: 450px;">
        					<input type="file" name="url" class="small" style="width: 440px;">
        				</div>
        			</div>
	

        		</div>
        		<div class="mws-button-row">
        			<input type="submit" value="确认添加" class="btn btn-danger">
        			<input type="reset" value="重置" class="btn ">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection