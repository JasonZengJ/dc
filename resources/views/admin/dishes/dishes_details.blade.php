@extends('admin.layout.index_head')
@extends('admin.layout.index_header')


@section('content')
    <style type="text/css">

        .menu-title {
            margin-left: 10px;
            color: #525252;
        }

    </style>

    <div class="am-g container">

        <div class="menu-title">
            <h3>菜品详情</h3>
        </div>

        <form class="am-form">
            <fieldset>
                <legend>表单标题</legend>

                <div class="am-form-group">
                    <label for="doc-ipt-email-1">邮件</label>
                    <input type="email" class="" id="doc-ipt-email-1" placeholder="输入电子邮件">
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-pwd-1">密码</label>
                    <input type="password" class="" id="doc-ipt-pwd-1" placeholder="设置个密码吧">
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-file-1">原生文件上传域</label>
                    <input type="file" id="doc-ipt-file-1">
                    <p class="am-form-help">请选择要上传的文件...</p>
                </div>

                <div class="am-form-group am-form-file">
                    <label for="doc-ipt-file-2">Amaze UI 文件上传域</label>
                    <div>
                        <button type="button" class="am-btn am-btn-default am-btn-sm">
                            <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
                    </div>
                    <input type="file" id="doc-ipt-file-2">
                </div>

                <div class="am-checkbox">
                    <label>
                        <input type="checkbox"> 复选框，选我选我选我
                    </label>
                </div>

                <div class="am-radio">
                    <label>
                        <input type="radio" name="doc-radio-1" value="option1" checked>
                        单选框 - 选项1
                    </label>
                </div>

                <div class="am-radio">
                    <label>
                        <input type="radio" name="doc-radio-1" value="option2">
                        单选框 - 选项2
                    </label>
                </div>

                <div class="am-form-group">
                    <label class="am-checkbox-inline">
                        <input type="checkbox" value="option1"> 选我
                    </label>
                    <label class="am-checkbox-inline">
                        <input type="checkbox" value="option2"> 同时可以选我
                    </label>
                    <label class="am-checkbox-inline">
                        <input type="checkbox" value="option3"> 还可以选我
                    </label>
                </div>

                <div class="am-form-group">
                    <label class="am-radio-inline">
                        <input type="radio"  value="" name="docInlineRadio"> 每一分
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" name="docInlineRadio"> 每一秒
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" name="docInlineRadio"> 多好
                    </label>
                </div>

                <div class="am-form-group">
                    <label for="doc-select-1">下拉多选框</label>
                    <select id="doc-select-1">
                        <option value="option1">选项一...</option>
                        <option value="option2">选项二.....</option>
                        <option value="option3">选项三........</option>
                    </select>
                    <span class="am-form-caret"></span>
                </div>

                <div class="am-form-group">
                    <label for="doc-select-2">多选框</label>
                    <select multiple class="" id="doc-select-2">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

                <div class="am-form-group">
                    <label for="doc-ta-1">文本域</label>
                    <textarea class="" rows="5" id="doc-ta-1"></textarea>
                </div>

                <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
            </fieldset>
        </form>
    </div>
@endsection


