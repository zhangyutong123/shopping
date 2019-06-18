@extends('admin.public.index')

@section('content')
   <div class="mws-stat-container clearfix">
        <div class="mws-panel-body no-padding">
            <table class="mws-table">
                <tbody>

                    <tr>
                        <td colspan="2" align='center'>当前时间:
                            <span>
                                @php
                                    date_default_timezone_set('PRC');
                                    echo date('Y-m-d H:i:s');
                                @endphp
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align='center'>
                            <div class="layui-card-header">系统信息</div>
                        </td>
                    </tr>
                    <tr>
                        <th>版本</th>
                        <td>测试版</td>
                    </tr>
                    <tr>
                        <th>服务器地址</th>
                        <td>{{ $arr['ip'] }}</td>
                    </tr>
                    <tr>
                        <th>操作系统</th>
                        <td>{{ $arr['os'] }}</td>
                    </tr>
                    <tr>
                        <th>运行环境</th>
                        <td>{{ $arr['environment'] }}</td>
                    </tr>
                    <tr>
                        <th>PHP版本</th>
                        <td>{{ $arr['versions'] }}</td>
                    </tr>
                    <tr>
                        <th>PHP运行方式</th>
                        <td>{{ $arr['operation'] }}</td>
                    </tr>
                    <tr>
                        <th>MYSQL版本</th>
                        <td>5.5.53</td>
                    </tr>
                </tbody>
            </table>
        </div>
   </div>
@endsection