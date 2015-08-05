@extends('layout.index_head')
@extends('layout.order_header')


@section('content')
    <style type="text/css">

        .menu-title {
            margin-top: 20px;
            margin-left: 10px;
            color: #525252;
        }

    </style>

    <div class="am-g container">

        <div class="menu-title">
            <h3>我的订单</h3>
        </div>

        <div class="am-scrollable-horizontal">
            <table class="am-table am-table-bordered am-table-striped am-text-nowrap">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>下单人</th>
                    <th>下单时间</th>
                    {{--<th>状态</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                <tr>
                    <td><a href="{{url('/order/'.$order->id)}}">{{$order->order_id2}}</a></td>
                    <td>{{$order->order_username}}</td>
                    <td>{{$order->order_addtime}}</td>
                    {{--<td>{{$order->order_addtime}}</td>--}}
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection


