@extends('admin.public.index')

@section('content')
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admins/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admins/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/themer.css" media="screen">

<title>MWS Admin - Table</title>

</head>

<body>

    <!-- Themer (Remove if not needed) -->  
    <div id="mws-themer">
        <div id="mws-themer-css-dialog">
            <form class="mws-form">
                <div class="mws-form-row">
                    <div class="mws-form-item">
                        <textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Themer End -->
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">

        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            <!-- Inner Container Start -->
            <div class="container">
                
                <!-- Panels Start -->
                
                <div class="mws-panel grid_8">
                    <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i>友情链接显示表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>友情链接名称</th>
                                    <th>友情链接路径</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($links as $k=>$v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->lname }}</td>
                                    <td>{{ $v->url }}</td>
                                    <!-- <td>{{ $v->status }}</td> -->
                                    <td>
                                        @if($v->status == 0)
                                        <kbd style="background: red;">未激活</kbd>
                                        @else
                                        <kbd style="background: green;">已激活</kbd>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-small" href="/links/{{ $v->id }}/edit?id={{ $v->id }}">修改</a>
                                        <form action="/links/{{ $v->id }}?id={{ $v->id }}" method="post" style="display: inline-block;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="submit" value="删除" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admins/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admins/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admins/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admins/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admins/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admins/jui/jquery-ui.custom.min.js"></script>
    <script src="/admins/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admins/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admins/plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="/admins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admins/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admins/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admins/js/demo/demo.table.js"></script>

</body>
</html>
@endsection