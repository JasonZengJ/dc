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
            <h3>用户管理</h3>
        </div>

        <div class="menu-button">
            <a href="users/create" class="am-btn am-btn-primary am-radius">添加用户</a>
        </div>

        <div class="am-scrollable-horizontal">
            <table class="am-table am-table-bordered am-table-striped am-text-nowrap">
                <thead>
                <tr>
                    <th>账户</th>
                    <th>用户名</th>
                    <th>登录时间</th>
                    {{--<th>操作</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->user_account}}</td>
                    <td>{{$user->user_name}}</td>
                    <td>{{$user->user_logintime}}</td>
                    {{--<td><a href="">编辑</a>  <a href="">删除</a></td>--}}
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection


