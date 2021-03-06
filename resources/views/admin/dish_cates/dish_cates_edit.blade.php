@extends('admin.layout.index_head')
@extends('admin.layout.index_header')


@section('content')


    <div class="am-g container">

        @if (count($errors) > 0)
            <div style="margin: 10px;border-radius: 3px" class="am-alert am-alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="am-form" action="{{url('/admin/dishCates/'.$dishCate->id)}}" method="POST">
            <fieldset>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">
                <legend>添加分类</legend>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">分类名</label>
                    <input class="am-form-field am-radius" id=""  name="cateName" value="{{$dishCate->foodtype_name}}" >
                </div>

                <div class="am-form-group" align="right">
                    <button type="button" class="am-btn am-btn-default am-radius" onclick="history.go(-1)">取消</button>
                    <button type="submit"  class="am-btn am-btn-success am-radius">确定</button>
                </div>

            </fieldset>
        </form>
    </div>
@endsection


