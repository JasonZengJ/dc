@extends('layout.index_head')
@extends('layout.order_header')


@section('content')

    <div class="am-g container">

        <form class="am-form" action="{{url('/user/'.$user->id)}}" method="POST" style="margin-top: 20px">
            <fieldset>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">
                <legend>个人资料编辑</legend>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">姓名</label>
                    <input class="am-form-field am-radius" id="" value="{{$user->user_name}}" name="userName" >
                </div>

                {{--<div class="am-form-group">--}}
                    {{--<label for="doc-ipt-email-1">原密码</label>--}}
                    {{--<input class="am-form-field am-radius" id="" value="{{$user->user_name}}" name="originPassword" >--}}
                {{--</div>--}}

                {{--<div class="am-form-group">--}}
                    {{--<label for="doc-ipt-email-1">新密码</label>--}}
                    {{--<input class="am-form-field am-radius" id="" value="{{$user->user_name}}" name="newPassword" >--}}
                {{--</div>--}}

                {{--<div class="am-form-group">--}}
                    {{--<label for="doc-ipt-email-1">新密码确认</label>--}}
                    {{--<input class="am-form-field am-radius" id="" value="{{$user->user_name}}" name="confirmPassword" >--}}
                {{--</div>--}}

                <div class="am-form-group" align="right" style="margin-top: 40px">
                    {{--<button type="button" class="am-btn am-btn-default am-radius" onclick="history.go(-1)">取消</button>--}}
                    <button type="submit"  class="am-btn am-btn-warning am-radius am-btn-block">确定</button>
                </div>

            </fieldset>
        </form>

    </div>
@endsection