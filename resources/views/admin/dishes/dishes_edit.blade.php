@extends('admin.layout.index_head')
@extends('admin.layout.index_header')


@section('content')


    <div class="am-g container">

        <form class="am-form" action="{{url('/admin/dishes/'.$dish->id)}}" method="POST">
            <fieldset>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">
                <legend>菜品编辑</legend>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">菜名</label>
                    <input class="am-form-field am-radius" id="" value="{{$dish->food_name}}" name="dish_name" >
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">价格</label>
                    <input class="am-form-field am-radius" id="" value="{{$dish->food_price}}" name="dish_price">
                </div>

                <div class="am-form-group">
                    <label for="doc-select-1">分类</label>
                    <select id="doc-select-1 am-radius" name="dish_cate" style="border-radius: 2px;">
                        @foreach($dishTypes as $dishType)
                            <option value="{{$dishType->id}}" @if($dish->food_types_id == $dishType->id) selected @endif>{{$dishType->foodtype_name}}</option>
                        @endforeach
                    </select>
                    <span class="am-form-caret"></span>
                </div>

                <div class="am-form-group" align="right">
                    <button type="button" class="am-btn am-btn-default am-radius" onclick="history.go(-1)">取消</button>
                    <button type="submit"  class="am-btn am-btn-success am-radius">确定</button>
                </div>

            </fieldset>
        </form>
    </div>
@endsection


