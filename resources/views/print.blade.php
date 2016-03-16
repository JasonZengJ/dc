@extends('layout.index_head')
@extends('layout.order_header')


@section('content')
    <script src="/js/LodopFuncs.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
    </script>
    <style type="text/css">

        .menu-title {
            margin-top: 20px;
            margin-left: 10px;
            color: #525252;
        }

        .am-g span {
            width: 80px;
            display: inline-block;
        }

        .am-g >p {
            margin-left: 10px;
        }

    </style>

    <div class="am-g container">

        <div class="menu-title">
            <h3>当前打印订单：</h3>
        </div>

        <p><span>订单编号: </span>{{$order->order_id2}}</p>
        <p><span for="">下单人: </span>{{$order->order_username}}</p>
        <p><span for="">下单时间: </span>{{$order->order_addtime}}</p>
        <p><span for="">位置说明: </span>{{$order->order_text}}</p>

        <p>菜单列表:</p>
        <div class="am-scrollable-horizontal">
            <table class="am-table am-table-bordered am-table-striped am-text-nowrap">
                <thead>
                <tr>
                    <th>菜名</th>
                    <th>分类</th>
                    <th>单价</th>
                    <th>数量</th>
                    {{--<th>状态</th>--}}
                </tr>
                </thead>
                <tbody>
                    @foreach($order->carts as $cart)
                    <tr>
                        <td>{{$cart->food->food_name}}</td>
                        <td>{{$cart->food->foodsType->foodtype_name}}</td>
                        <td>{{$cart->food->food_price}}</td>
                        <td>{{$cart->cart_count}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{--<div class="am-form-group" >--}}
            {{--<a id="print" class="am-btn am-btn-warning am-radius am-btn-block" >打印订单</a>--}}
        {{--</div>--}}

    </div>

    <script language="javascript" type="text/javascript">

//        var foods = JSON.parse('{!!$foods!!}');
        var LODOP; //声明为全局变量

//        if (status === '0') {
            print_order();
//        }


        function print_order() {
            AddTitle();
            var iCurLine=50;//标题行之后的数据从位置80px开始打印
            var foods = JSON.parse('{!!$foods!!}');
            for (i = 0; i < foods.length; i++) {
                // if (document.getElementById("CK"+i).checked) {
                // LODOP.ADD_PRINT_TEXT(iCurLine,0,100,20,foods[i]["food_name"]);
                // LODOP.ADD_PRINT_TEXT(iCurLine,60,100,20,foods[i]["foods_price"]);
                // LODOP.ADD_PRINT_TEXT(iCurLine,120,100,20,foods[i]["cart_count"]);
                // LODOP.ADD_PRINT_TEXT(iCurLine,180,100,20,foods[i]["cart_price"]);
                LODOP.ADD_PRINT_TEXT(iCurLine,0,100,20,foods[i]["food_name"]);
                LODOP.ADD_PRINT_TEXT(iCurLine,85,100,20,foods[i]["foods_price"]);
                LODOP.ADD_PRINT_TEXT(iCurLine,145,100,20,foods[i]["cart_count"]);
                LODOP.ADD_PRINT_TEXT(iCurLine,190,100,20,foods[i]["cart_price"]);
                iCurLine=iCurLine+25;//每行占25px
                // }
            }
            LODOP.ADD_PRINT_LINE(iCurLine,0,iCurLine,510,0,1);
            iCurLine += 5;
            LODOP.ADD_PRINT_TEXT(iCurLine,0,450,20,"下单人：{{$order->order_username}}");
            iCurLine += 20;
            LODOP.ADD_PRINT_TEXT(iCurLine,0,300,20,"打印时间："+(new Date()).toLocaleDateString()+" "+(new Date()).toLocaleTimeString());
            iCurLine += 20;
            LODOP.ADD_PRINT_TEXT(iCurLine,0,150,20,"合计金额：{{$order->order_price}}元");

            var text = '{{str_replace(PHP_EOL, ' , ',$order->order_text)}}' ;
            var style_index = 10 + 4 * foods.length;
            var line = parseInt((text.length + 5) / 17);

            var pos = 9 + 4 * foods.length;
            iCurLine += 20;
            LODOP.ADD_PRINT_TEXT(iCurLine,0,550,30,"位置和备注：" + text.substring(0,12));
            LODOP.SET_PRINT_STYLEA(++pos,"FontSize",12);
            for (var i = 1; i <= line ; i++) {
                iCurLine += 30;
                LODOP.ADD_PRINT_TEXT(iCurLine,0,550,30,text.substring(12 + (i-1) * 17,12 + i * 17));
                LODOP.SET_PRINT_STYLEA(++pos,"FontSize",12);
            }


            LODOP.SET_PRINT_PAGESIZE(3,800,45,"");//这里3表示纵向打印且纸高“按内容的高度”；1385表示纸宽138.5mm；45表示页底空白4.5mm
            LODOP.PRINT();


            $.post("{{url('/printer/printed-order')}}",{
                'id' : '{{$order->id}}'
            },function() {
                var interval = setInterval(function(){
                    $.post("{{url('/printer/check-order')}}", {
                            }, function (result, textStatus){
                                result = JSON.parse(result);
                                if (result.done) {
                                    clearInterval(interval);
                                    location.href = "{{url('/printer/order-info')}}?id="+result.data.orderId;
                                }

                            }
                    );
                },1000);
            });


        };
        function AddTitle(){
            LODOP=getLodop();
            LODOP.PRINT_INIT("打印控件功能演示_Lodop功能_不同高度幅面");
            // LODOP.ADD_PRINT_TEXT(17,0,355,30,"北京市东城区沃乐福商城收款票据");
            LODOP.SET_PRINT_STYLEA(1,"FontSize",13);
            LODOP.SET_PRINT_STYLEA(1,"Bold",1);
            LODOP.ADD_PRINT_TEXT(15,0,100,20,"菜名");
            LODOP.SET_PRINT_STYLEA(2,"FontSize",10);
            LODOP.SET_PRINT_STYLEA(2,"Bold",1);
            LODOP.ADD_PRINT_TEXT(15,85,100,20,"单价");
            LODOP.SET_PRINT_STYLEA(3,"FontSize",10);
            LODOP.SET_PRINT_STYLEA(3,"Bold",1);
            LODOP.ADD_PRINT_TEXT(15,145,100,20,"数量");
            LODOP.SET_PRINT_STYLEA(4,"FontSize",10);
            LODOP.SET_PRINT_STYLEA(4,"Bold",1);
            LODOP.ADD_PRINT_TEXT(15,190,100,20,"小计(元)");
            LODOP.SET_PRINT_STYLEA(5,"FontSize",10);
            LODOP.SET_PRINT_STYLEA(5,"Bold",1);
            LODOP.ADD_PRINT_LINE(35,0,35,510,0,1);
        };
    </script>

@endsection


