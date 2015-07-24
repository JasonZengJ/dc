@extends('admin.layout.index_head')
@extends('admin.layout.index_header')


@section('content')


    <div class="am-g container">

        <form class="am-form" action="../users" method="POST">
            <fieldset>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <legend>用户添加</legend>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">用户账号</label>
                    <input class="am-form-field am-radius"  name="user_account" >
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">密码</label>
                    <input class="am-form-field am-radius"  name="password">
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">姓名</label>
                    <input class="am-form-field am-radius"  name="user_name">
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">权限</label></br>
                    <label class="am-radio-inline">
                        <input type="radio"  value="0" name="user_type" checked>普通用户
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio"  value="1" name="user_type"> 管理员
                    </label>
                </div>


                <div class="am-form-group" align="right">
                    <button type="button" class="am-btn am-btn-default am-radius" onclick="history.go(-1)">取消</button>
                    <button type="submit"  class="am-btn am-btn-success am-radius">确定</button>
                </div>

            </fieldset>
        </form>
    </div>
@endsection


