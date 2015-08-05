
@section("header")

    <style>
        .am-header {
            background-color: #ffffff;
            border-bottom: 1px solid #F37F3A;
        }

        .am-header .am-header-nav .header-title {
            color: #5e5e5e;
            font-size: 18px;
            font-weight: 300;
            padding-left: 5px;
        }

        .am-header .am-header-right {
            margin: 10px;
            margin-right: 15px;
        }

        .am-offcanvas .am-offcanvas-bar {
            background-color: #ffffff;
            border: 0px;
        }
        .am-offcanvas-bar:after {
            background-color: #ffffff;
        }

        .am-offcanvas-content .avatar img {
            margin-top: 25px;
        }

        .am-offcanvas-content .avatar .username {
            color:#333;
        }

        .am-offcanvas-content .orders a {
            color: #808080;
        }

        .am-offcanvas-content>div {
            width: 100%;
        }

        .am-offcanvas-content .avatar .username,.am-offcanvas-content .orders{
            line-height: 35px;
        }

        .am-offcanvas-content .orders {
            font-size: 1.4rem;
            margin-bottom: 7px;
        }

        .am-offcanvas-content .logout {
            position: absolute;
            bottom: 90px;
            /*right: 10px;*/
            left: 0px;
        }

        .am-offcanvas-content .admin {
            position: absolute;
            bottom: 30px;
            /*right: 10px;*/
            left: 0px;
        }

        .am-offcanvas-content .admin a {
            color: #0e90d2;
        }

        .am-offcanvas-content span img {
            margin-right: 15px;
        }
        .am-offcanvas-content span a {
            font-size: 16px;
            vertical-align: middle;
        }
        hr {
            margin: 10px 0px;

        }
    </style>

    <header data-am-widget="header" class="am-header am-header-fixed">
        <div class="am-header-left am-header-nav">
            <a href="/" class="header-title" >
                点餐宝
            </a>
        </div>
        <h1 class="am-header-title">
            {{--<a href="#title-link" class="">s</a>--}}
        </h1>
        <div class="am-header-right am-header-nav">

            @if($user)
            <a href="#right-link" class="" data-am-offcanvas="{target: '#user_center'}">
                <img src="/image/frontend/dish_person.png" style="height: 25px" alt=""/>
            </a>
            @else
                <a href="{{url('/auth/login')}}" >
                    <img src="/image/frontend/dish_person.png" style="height: 25px" alt=""/>
                </a>
            @endif
        </div>
        @if($user)
        <!-- 侧边栏内容 -->
        <div id="user_center" class="am-offcanvas">
            <div class="am-offcanvas-bar am-offcanvas-bar-flip" style="  width: 50%;">
                <div class="am-offcanvas-content">
                    <div class="avatar" align="center">

                        <img width="67" src="/image/frontend/siderbar_person.png">
                        <div class="username">
                            {{$user->user_name}}
                            <a href="{{url('user/'.$user->id.'/edit')}}"><i class="am-icon-edit" style="color: #333333;position: absolute;right: 20px;margin-top: 10px;font-size: 18px"></i></a>


                        </div>


                    </div>
                    <hr />
                    {{--<div class="orders">--}}
                        {{--<span><img width="25" src="/image/frontend/dish_person.png')}}"><a href="{{url('recvaddr')}}">我的资料</a></span>--}}
                    {{--</div>--}}
                    <div class="orders">
                        <span><img width="25" src="/image/frontend/siderbar_myorders.png"><a href="{{url('/order')}}">我的订单</a></span>
                    </div>

                    <div class="logout" align="center" >
                        <a href="{{url('/auth/logout')}}" class="am-btn am-btn-danger am-btn-block" style="color: #ffffff;padding: 0.5em 1.0em;width: 70%">注销</a>
                        @if($user && $user->user_type == '1')
                            <a href="{{url('/admin')}}" target="_blank" style="padding: 0.5em 0em;color:#0e90d2">后台管理</a>
                        @endif
                    </div>



                </div>
            </div>
        </div>
        @endif
        <!-- 侧边栏内容 -->
    </header>

@endsection