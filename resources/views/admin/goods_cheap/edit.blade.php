@extends('admin.public.index')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>特价商品添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/goods_cheap/{{ $goods_cheap->id }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">特价商品名称</label>
                        <div class="mws-form-item">
                            <input type="text" name="gcname" value="{{ $goods_cheap->gcname }}" class="small">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">特价商品价格</label>
                        <div class="mws-form-item">
                            <input type="text" name="gcprice" value="{{ $goods_cheap->gcprice }}" class="small">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">特价商品原价</label>
                        <div class="mws-form-item">
                            <input type="text" name="gprice" value="{{ $goods_cheap->gprice }}" class="small">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">特价商品尺码</label>
                        <div class="mws-form-item">
                            <input type="text" name="gcsize" value="{{ $goods_cheap->gcsize }}" class="small">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">特价商品图片</label>
                        <div class="mws-form-item">
                            <input type="hidden" name="gcprofile_path" value="{{ $goods_cheap->gcprofile }}">
                            <img src="/uploads/{{ $goods_cheap->gcprofile }}" style="width: 150px;">
                        <br>
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