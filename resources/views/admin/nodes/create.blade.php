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
    	<span>权限管理</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/nodes" method="post">
            {{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">权限名称</label>
    				<div class="mws-form-item">
    					<input type="text" name="desc" class="small">
    				</div>
    			</div>
    		     <div class="mws-form-row">
                    <label class="mws-form-label">控制器名称</label>
                    <div class="mws-form-item">
                        <input type="text" name="cname" class="small">
                    </div>
                </div> 
    			<div class="mws-form-row">
                    <label class="mws-form-label">方法名称</label>
                    <div class="mws-form-item">
                        <input type="text" name="aname" class="small">
                    </div>
                </div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="Submit" class="btn btn-danger">
    			<input type="reset" value="Reset" class="btn ">
    		</div>
    	</form>
    </div>    	
</div>
@endsection