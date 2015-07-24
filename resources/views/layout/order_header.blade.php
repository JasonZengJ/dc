
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


    </header>

@endsection