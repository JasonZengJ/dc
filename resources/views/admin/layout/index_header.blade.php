
@section("header")

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
    </script>

    <style>
        .am-topbar {
            background-color: #ffffff;
            border-bottom: 1px solid #F37F3A;
        }

        .am-topbar > a {
            line-height: 50px;
            font-size: 18px;
            margin-left: 15px;
        }

    </style>

    <header class="am-topbar admin-header">
        <a href="/" style="float: left">点餐宝</a>
        {{--<div class="am-topbar-brand" style="width: 100%" align="center">--}}
        {{--</div>--}}

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" style="" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
                <li class="active"><a href="{{url('/admin/dishes')}}"><span class="am-icon-beer"></span> 菜品管理</a></li>
                <li><a href="{{url('/admin/dishCates')}}"><span class="am-icon-archive"></span> 菜品分类管理</a></li>
                <li><a href="{{url('/admin/orders')}}"><span class="am-icon-list"></span>  订单管理</a></li>
                <li><a href="{{url('/admin/statistics')}}"><span class="am-icon-user"></span>  销量统计</a></li>
                {{--<li><a href="{{url('/admin/users')}}"><span class="am-icon-user"></span>  用户管理</a></li>--}}
                {{--<li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>--}}
                {{--<li class="am-dropdown" data-am-dropdown>--}}
                    {{--<a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">--}}
                        {{--<span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="am-dropdown-content">--}}
                       {{----}}
                    {{--</ul>--}}
                {{--</li>--}}
            </ul>
        </div>
    </header>

@endsection