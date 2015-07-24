@extends('layout.index_head')
@extends('layout.index_header')

@section('content')

    <style>
        .am-header-right.am-header-nav {
            margin-top: 0px;
        }
    </style>

    <div class="am-g container">

        <form id="orderForm" class="am-form" action="/order" method="POST">
            <fieldset>
                <input type="hidden" name="_token"     value="{{csrf_token()}}">
                <input type="hidden" name="dishData"   value="{{$dishDataJson}}">
                <input type="hidden" name="totalPrice" value="{{$totalPrice}}">
                <legend style="border-bottom: 0px"></legend>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">点单详情:</label>
                    <div class="am-scrollable-horizontal">
                        <table class="am-table am-table-bordered am-table-striped am-text-nowrap">
                            <thead>
                            <tr>
                                <th>名称</th>
                                <th>分类</th>
                                <th>价格</th>
                                <th>数量</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($dishData as $dish)
                                <tr>
                                    <td>{{$dish->name}}</td>
                                    <td>{{$dish->cateName}}</td>
                                    <td>{{$dish->price}}</td>
                                    <td>{{$dish->amount}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">位置说明:</label>
                    <textarea class="" rows="5" id="position" name="position"></textarea>
                </div>

                <div class="am-form-group" >
                    <a id="makeOrder" class="am-btn am-btn-warning am-radius am-btn-block">下单</a>
                </div>

            </fieldset>
        </form>

    </div>

    <div class="am-modal am-modal-alert" tabindex="-1" id="no-position-alert">
        <div class="am-modal-dialog">
            <div class="am-modal-bd">
                写一下客人位置先
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn">确定</span>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        $(function(){

            $('#makeOrder').click(function(){

                var position = $('#position').val();
                if (position == "" || !position) {
                    $('#no-position-alert').modal();
                } else {
                    $('#orderForm').submit();
                }
            });

        })
    </script>

@endsection


