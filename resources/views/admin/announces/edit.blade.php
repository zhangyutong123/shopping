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
        	<span>公告修改</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/announce/{{ $announce->id }}" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		{{ method_field('PUT') }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">公告标题</label>
        				<div class="mws-form-item">
        					<input type="text" name="aname" class="small" value="{{ $announce->aname }}">
        				</div>
        			</div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">公告标签</label>
                        <div class="mws-form-item">
                            <input type="text" name="alabel" class="small" value="{{ $announce->alabel }}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">公告内容</label>
                        <div class="mws-form-item">
                            <textarea name="acontent" id="" cols="80" rows="60">{{ $announce->acontent }}</textarea>
                        </div>
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