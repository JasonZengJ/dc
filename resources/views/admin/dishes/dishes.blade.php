@extends('admin.layout.index_head')
@extends('admin.layout.index_header')


@section('content')
    <style type="text/css">

        .menu-title {
            margin-left: 10px;
            color: #525252;
        }
        .menu-button {
            margin: 0px 0px 15px 10px;

        }

    </style>

    <div class="am-g container">

        <div class="menu-title">
            <h3>饮品管理</h3>
        </div>

        <div class="menu-button">
            <a href="dishes/create" class="am-btn am-btn-primary am-radius">添加餐品</a>
        </div>

        <div class="am-scrollable-horizontal">
            <table class="am-table am-table-bordered am-table-striped am-text-nowrap">
                <thead>
                <tr>
                    <th>名字</th>
                    <th>分类</th>
                    <th>价格</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dishes as $dish)
                <tr>
                    <td>{{$dish->food_name}}</td>
                    <td>{{$dish->foodsType->foodtype_name}}</td>
                    <td>{{$dish->food_price}}</td>
                    <td><a href="dishes/{{$dish->id}}/edit">编辑</a> <a class="deleteDish" data-id="{{$dish->id}}" data-name="{{$dish->food_name}}">删除</a> </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(function(){

            function deleteDish() {

                var r = confirm('是否要删除？');

                if (!r) return;

                var id = $(this).data('id');

                $.ajax('dishes/'+id,{
                    method:'POST',
                    data:{
                        _method:'DELETE'
                    },
                    success:function(data){
                        data = JSON.parse(data);
                        if(!data.code) {
                            location.reload();
                        }
                        alert(data.msg);
                    }
                });
            }

            $('.deleteDish').click(deleteDish);

        });
    </script>
@endsection


