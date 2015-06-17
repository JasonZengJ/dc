@extends("layout.index_head")
@extends("layout.index_header")

@section('content')

    <style>
        .forget-pw {
            float: left;
            vertical-align: middle;
            margin-top: 5px;
        }
    </style>

    <div class="am-g">
        <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
            {{--<h1>登录</h1>--}}
            {{--<hr>--}}

            <form method="post" class="am-form" role="form" action="{{ url('/auth/login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label for="phone">手机号码:</label>
                <input type="number" name="phone" id="phone"  value="{{ old('email') }}">
                <br>
                <label for="password">密码:</label>
                <input type="password" name="password" id="password" value="">
                <br>
                <label for="remember-me">
                    <input id="remember-me" type="checkbox">
                    记住密码
                </label>
                <br />
                <div class="am-cf">
{{--                    <a class="forget-pw" href="{{ url('/password/email') }}">忘记密码了？</a>--}}
                    <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-block">
                    {{--</br>--}}
                    <input type="button" name="" value="注 册" class="am-btn am-btn-primary am-btn-block">
                </div>
            </form>
            <hr>
            <p>© 2014 Jason. Licensed under MIT license.</p>
            <p><a href="">后台管理</a></p>
        </div>
    </div>


@endsection