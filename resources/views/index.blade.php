@extends('layout.index_head')
@extends('layout.index_header')

<style type="text/css">

    .am-g {
        /*overflow: hidden;*/
    }

    .am-g .dish.dish-cates-item.dish-cates-active {
        background-color: #ffffff;
        color: #F37F3A;
        margin-right: -2px;
    }

    .am-g .dish.dish-cates-item.dish-cates-active::before {
        content: "◉ ";
        display: inline-block;
        font-size: 12px;
        margin-right: 2px;
    }

    .am-g > .am-u-sm-9 {
        overflow: hidden;
        height: 100%;
    }

    .dish {
        padding: 10px 0px;
    }

    .am-g .dish-cates {
        height: 100%;
        background-color: #f5f5f5;
        /*border-right: 1px solid #cccccc;*/
        padding-left: 0px;
        padding-right: 0px;
        margin: 0px;
        overflow-y: scroll;
        overflow-x: hidden;

    }

    .am-g .dish.dish-cates-item {
        padding-left: 10px;
        margin-left: 0px;
        /*border-bottom: 1px solid #cccccc;*/
        font-size: 14px;
        color: #525252;
    }

    .am-g.dish-foods {
        overflow-y: scroll;
        overflow-x: hidden;
        height: 100%;
    }

    .dish-foods .am-g.dish-foods-item {
        padding-left: 10px;
        border-bottom: 1px solid #eee;
        margin: 5px;
    }

    .dish-foods .am-g.dish-foods-item .item-operation {
        float: right;
        margin-right: 10px;
    }
    .dish-foods .am-g.dish-foods-item .item-operation .amount{
        /*line-height: 1;*/
    }

    .dish-foods .am-g.dish-foods-item .item-price {
        float: left;
        font-size: 15px;

    }


    .dish-foods .am-g.dish-foods-item .item-name {
        font-size: 18px;
    }

    .dish span img {
        width: 25px;
    }

    @media screen and (max-width: 325px) {
        .am-g > .am-u-sm-3.dish-cates {
            width: 32%;
        }
        .am-g > .am-u-sm-9 {
            width: 68%;
        }
    }

    @media screen and (max-width: 413px) and (min-width: 325px) {
        .am-g > .am-u-sm-3.dish-cates {
            width: 30%;
        }
        .am-g > .am-u-sm-9 {
            width: 70%;
        }
    }

</style>

@section('content')

    <div class="am-g container">
        <div class="am-u-sm-3 dish-cates" >


            @foreach($foods_data as $key => $foodType)
            <div data-id = "{{$foodType->id}}" class="dish dish-cates-item  am-g @if($key == 0) dish-cates-active @endif">
                {{$foodType->foodtype_name}}
            </div>
            @endforeach

        </div>

        <div  class="am-u-sm-9 ">
            @foreach($foods_data as $key => $foodType)
            <div id="{{$foodType->id}}" class="am-g dish-foods" @if($key) style="display: none" @endif>

                @foreach($foodType->foods as $key => $food)
                <div class="am-g dish dish-foods-item" >
                    <div class="item-name">{{$food->food_name}} </div>

                    <div class="item-price">￥{{$food->food_price}} </div>

                    <div class="item-operation" data-id = '{{$food->id}}' data-name = '{{$food->food_name}}' data-price="{{$food->food_price}}" data-catename="{{$food->foodsType->foodtype_name}}" data-cateId = "{{$food->foodsType->id}}" >
                        <span  class="minus" style="display: none"><img src="{{asset('/image/frontend/dish_minus.png')}}"></span>
                        <span  class="amount" style="display: none">0</span>
                        <span  class="add"><img src="{{asset('/image/frontend/dish_add.png')}}"></span>
                    </div>
                </div>
                @endforeach


            </div>
            @endforeach


        </div>

    </div>

    <!-- 底栏 -->
    <div data-am-widget="navbar" class="am-navbar am-cf " id="" style="z-index: 1009">
        <div class="am-navbar-nav am-cf am-avg-sm-4" style="height: 49px;padding: 0px;overflow: visible;border-top: 1px solid #f0f0f0">

            <div class="am-g">

                <span id="totalAmount" style="float: left;margin-left: 10px">
                    点了: 0 个
                </span>

                <button id="confirmOrder" type="button" class="am-btn am-btn-warning am-radius" style="  float: right;margin: 5px 10px 0px 0px">选好了</button>
            </div>

        </div>

    </div>

    <form id="orderForm" style="display: none" action="order/create" method="GET">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="dishData" id="dishData">

    </form>

    <div class="am-modal am-modal-alert" tabindex="-1" id="no-dishes-alert">
        <div class="am-modal-dialog">
            <div class="am-modal-bd">
                先点些东西吧
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn">确定</span>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('js/lib/jquery/jquery.touchSwipe.min.js')}}"></script>

    <script type="text/javascript">

        $(function(){

            var $dish_cates = $('.dish-cates-item');
            var $dish_menu  = $('.dish-menu-item');

            $dish_cates.click(clickedDishCates);

            $dish_menu.click(clickedDishMenu);

            function clickedDishCates() {
                $dish_cates.removeClass("dish-cates-active");
                $(this).addClass("dish-cates-active");
                var id = $(this).data('id');
                $('.dish-foods').css({
                    'display' : 'none'
                });
                $('#'+id).css({
                    'display' : 'inherit'
                });
            }

            function clickedDishMenu() {
                $dish_menu.removeClass("am-active");
                $(this).addClass("am-active");
            }


        })

    </script>
    <script type="text/javascript" src="{{asset('js/index.js')}}"></script>
@endsection


