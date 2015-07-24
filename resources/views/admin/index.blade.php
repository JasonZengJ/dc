@extends('admin.layout.index_head')
@extends('admin.layout.index_header')


@section('content')
    <style type="text/css">

        .menu-title {
            margin-left: 10px;
            color: #525252;
        }

    </style>

    <div class="am-g container">

        <div class="menu-title">
            <h3>菜品管理</h3>
        </div>

        <div class="am-scrollable-horizontal">
            <table class="am-table am-table-bordered am-table-striped am-text-nowrap">
                <thead>
                <tr>
                    <th>网站名称</th>
                    <th>网址</th>
                    <th>创建时间</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Amaze UI</td>
                    <td>http://amazeui.org</td>
                    <td>2012-10-01</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection


