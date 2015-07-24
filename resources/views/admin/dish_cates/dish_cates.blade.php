@extends('admin.layout.index_head')
@extends('admin.layout.index_header')


@section('content')
    <style type="text/css">

        .menu-title {
            margin-left: 10px;
            color: #525252;
        }
        .menu-button {
            margin: 0px 0px 15px 10px;

        }

    </style>

    <div class="am-g container">

        <div class="menu-title">
            <h3>分类管理</h3>
        </div>

        <div class="menu-button">
            <a href="dishCates/create" class="am-btn am-btn-primary am-radius">添加分类</a>
        </div>

        <div class="am-scrollable-horizontal">
            <table class="am-table am-table-bordered am-table-striped am-text-nowrap">
                <thead>
                <tr>
                    <th>分类名</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dishCates as $dishCate)
                <tr>
                    <td>{{$dishCate->foodtype_name}}</td>
                    <td><a href="dishCates/{{$dishCate->id}}/edit">编辑</a>
                        {{--<a class="deleteDish" data-id="{{$dishCate->id}}" data-name="{{$dishCate->foodtype_name}}">删除</a> --}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection


