@extends('admin.public.index')

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>友情链接修改</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/links/{{ $links->id }}" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
                {{ method_field('PUT') }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">友情链接名称</label>
        				<div class="mws-form-item">
        					<input type="text" name="lname" value="{{ $links->lname }}" class="small">
        				</div>
        			</div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">友情链接地址</label>
                        <div class="mws-form-item">
                            <input type="text" name="url" value="{{ $links->url }}" class="small">
                        </div>
                    </div>
        		<div class="mws-button-row">
        			<input type="submit" value="修改" class="btn btn-danger">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection