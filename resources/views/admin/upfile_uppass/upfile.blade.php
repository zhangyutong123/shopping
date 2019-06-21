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
        	<span>修改头像</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/dofile" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<div class="mws-form-inline">
                    <input type="hidden" name="old_profile" value="">
                    <div class="mws-form-row" style="width: 450px;">
                        <label class="mws-form-label">头像</label>
                        <div class="mws-form-item" style="width: 450px;">
                            <input type="file" name="profile" class="small" style="width: 440px;" style="display: block;">
                        </div>
                        <br />
                        <img style="margin-left: 155px; width: 100px; " src="/uploads/{{ session('admin_userinfo')->profile }}" alt="User Photo">.
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