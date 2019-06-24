@extends('admin.public.index')


@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>角色管理</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/roles" method="post">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">角色名称</label>
    				<div class="mws-form-item">
                        <select name="pname" id="">
    					@foreach($roles_data as $k=>$v)
                            <option value ="{{ $v->id }}" {{ $v->id == $id ? 'selected' : '' }}>{{ $v->rname }}</option>
                        @endforeach
                        </select>
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