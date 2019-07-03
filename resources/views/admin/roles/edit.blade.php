@extends('admin.public.index')


@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>角色管理</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/roles/{{ $roles->id }}" method="post">
    		{{ csrf_field() }}
            {{ method_field('PUT') }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">角色名称</label>
                    <div class="mws-form-item" >
                        <input type="text" class="small" name="rname" disabled value="{{  $roles->rname }}" style="width:300px">
                    </div>
                </div>
                <div class="mws-form-row">
                        <label class="mws-form-label">角色权限</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline" >
                                @foreach($list as $k=>$v)
                                <h4>{{ $conall[$k] }} <small>{{ $k }}</small></h4>
                                    @foreach($v as $kk=>$vv)
                                    @if(in_array($vv['id'],$temp))

                                    <li>
                                        <input type="checkbox" name="nids[]" value="{{ $vv['id'] }}" checked>
                                        <label>{{ $vv['desc'] }}</label>
                                    </li>
                                    @else
                                    <li>
                                        <input type="checkbox" name="nids[]" value="{{ $vv['id'] }}">
                                        <label>{{ $vv['desc'] }}</label>
                                    </li>
                                    @endif
                                    @endforeach
                                @endforeach
                            </ul>
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
@endsection;