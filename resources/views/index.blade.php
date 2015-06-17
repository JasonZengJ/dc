@extends('layout.index_head')
@extends('layout.index_header')

<style type="text/css">

    .dish-cates-active {
        background-color: #ffffff;
        color: #525252;
    }

    .dish {
        padding: 10px 0px;
    }

    .am-g .dish-cates {
        /*color: #ffffff;*/
        /*padding:20px 0px;*/
        /*border-top-right-radius: 3px;*/
        /*border-bottom-right-radius: 3px;*/
        height: 100%;
        background-color: #f5f5f5;
        border-right: 1px solid #cccccc;
        padding-left: 0px;

    }

    .am-g .dish.dish-cates-item {
        padding-left: 10px;
        margin-left: 0px;
        /*border-top-left-radius: 3px;*/
        /*border-bottom-left-radius: 3px;*/
        border-bottom: 1px solid #cccccc;
        font-size: 16px;
        /*border-right: 1px solid #cccccc;*/
    }

    .dish-foods {
        /*padding: 20px 0px;*/

    }

    .dish-foods .am-g.dish-foods-item {
        padding-left: 20px;
        border-bottom: 1px solid #cccccc;
        margin: 5px;
    }

    .dish-foods .am-g.dish-foods-item .item-sales {
        font-size: 12px;
        color: #919191;
        float: right;
    }

</style>

@section('content')

    <div class="am-g ">
        <div class="am-u-sm-5 dish-cates" >



            <div class="dish dish-cates-item dish-cates-active am-g ">
                烟酒
            </div>
            <div class="dish dish-cates-item am-g ">
                果盘
            </div>
            <div class="dish dish-cates-item am-g ">
                冷饮
            </div>
            <div class="dish dish-cates-item am-g ">
                冰饮
            </div>
        </div>
        <div class="am-u-sm-7 ">
            <div class="am-g dish-foods">

                <div class="am-g dish dish-foods-item">
                    <div class="item-name">水果 <span class="item-sales">销量:123</span></div>

                    <div class="item-operation">
                        <span>+</span>1<span>-</span>
                    </div>
                </div>
                <div class="am-g dish dish-foods-item">
                    <div class="item-name">水果</div>
                    <div class="item-sales">
                        销量:123
                    </div>
                    <div class="item-operation">
                        <span>+</span>1<span>-</span>
                    </div>
                </div>
                <div class="am-g dish dish-foods-item">
                    <div class="item-name">水果</div>
                    <div class="item-sales">
                        销量:123
                    </div>
                    <div class="item-operation">
                        <span>+</span>1<span>-</span>
                    </div>
                </div>
            </div>
            <div class="am-g dish-carts">

            </div>

        </div>
    </div>
    <script type="text/javascript">

        $(function(){
            var $dish_cates = $('.dish-cates-item');
            var $dish_menu  = $('.dish-menu-item');
            $dish_cates.click(function(){
                $dish_cates.removeClass("dish-cates-active");
                $(this).addClass("dish-cates-active");
            });
            $dish_menu.click(function(){
                $dish_menu.removeClass("am-active");
                $(this).addClass("am-active");
            });
        })

    </script>
@endsection


