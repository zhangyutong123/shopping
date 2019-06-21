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
        	<span>用户修改</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/dopass" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">旧密码</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name="oldpass" style="width:300px">
        				</div>
        			</div>

					<div class="mws-form-row">
        				<label class="mws-form-label">新密码</label>
        				<div class="mws-form-item">
        					<input type="password" class="small" name="upass" id="pwd" style="width:300px" >
        				</div>
        			</div>

        			<div class="mws-form-row">
        				<label class="mws-form-label">确认密码</label>
        				<div class="mws-form-item">
        					 <input type="password" class="small" name="repass" style="width:300px">
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