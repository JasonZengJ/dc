@extends('layout.index_head')
@extends('layout.index_header')

<style type="text/css">

    .am-g {
        /*overflow: hidden;*/
    }

    .am-g .dish.dish-cates-item.dish-cates-active {
        background-color: #ffffff;
        color: #fd4548;
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

    .dish-foods .am-g.dish-foods-item .item-sales {
        font-size: 12px;
        color: #919191;
        float: right;
    }


    .dish-foods .am-g.dish-foods-item .item-name {
        font-size: 18px;
        /*color: #919191;*/
        /*float: right;*/
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

                    <div class="item-operation">
                        <span>+</span>1<span>-</span>
                    </div>
                </div>
                @endforeach


            </div>
            @endforeach


        </div>

    </div>
    <script type="text/javascript">

        $(function(){
            var $dish_cates = $('.dish-cates-item');
            var $dish_menu  = $('.dish-menu-item');

            $dish_cates.click(function(){

                $dish_cates.removeClass("dish-cates-active");
                $(this).addClass("dish-cates-active");
                var id = $(this).data('id');
                $('.dish-foods').css({
                    'display' : 'none'
                });
                $('#'+id).css({
                    'display' : 'inherit'
                });

            });

            $dish_menu.click(function(){
                $dish_menu.removeClass("am-active");
                $(this).addClass("am-active");
            });
        })

    </script>
@endsection


