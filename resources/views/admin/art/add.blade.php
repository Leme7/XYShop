@extends('admin.right')

@section('content')
<form action="javascript:ajax_submit();" method="post" id="form_ajax">
    {{ csrf_field() }}
    
    <table class="table table-striped">
        @if($catid == '0')
        <tr>
            <td class="td_left">选择栏目：</td>
            <td>
                <select name="data[catid]" id="catid" class="form-control input-sm">
                    <option value="0">选择栏目</option>
                    {!! $cate !!}
                </select>
                <p class="input-info"><span class="color_red">*</span>必填，文章归哪个栏目</p>
            </td>
        </tr>
        @else
            <input type="hidden" name="data[catid]" value="{{ $catid }}"/>
        @endif

        <tr>
            <td class="td_left">文章标题：</td>
            <td>
                <input type="text" name="data[title]" value="{{ old('data.title') }}" class="form-control">
                <p class="input-info"><span class="color_red">*</span>不超过255字符</p>
            </td>
        </tr>
        
        <tr>
            <td class="td_left">描述：</td>
            <td>
                <textarea name="data[describe]" class="form-control input-lg" rows="5">{{ old('data.describe') }}</textarea>
            </td>
        </tr>

         <tr>
            <td class="td_left">缩略图：</td>
            <td>
                @component('admin.component.thumb')
                    @slot('filed_name')
                        thumb
                    @endslot
                    {{ old('data.thumb') }}
                @endcomponent
            </td>
        </tr>

        <tr>
            <td class="td_left">内容：</td>
            <td>
                @component('admin.component.ueditor')
                    @slot('id')
                        container
                    @endslot
                    @slot('filed_name')
                        content
                    @endslot
                    {{ old('data.content') }}
                @endcomponent
                <p class="input-info"><span class="color_red">*</span></p>
            </td>
        </tr>

        <tr>
            <td class="td_left">来源：</td>
            <td>
                <input type="text" name="data[source]" value="{{ old('data.source') }}" class="form-control input-sm">
            </td>
        </tr>

        <tr>
            <td class="td_left">排序：</td>
            <td>
                <input type="text" name="data[sort]" value="{{ old('data.sort',0) }}" class="form-control input-xs">
                <p class="input-info">数字越大越靠前</p>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <div class="btn-group">
                    <button type="reset" name="reset" class="btn btn-xs btn-warning">重填</button>
                    <div onclick='ajax_submit_form("form_ajax","{{ url('/console/art/add') }}")' name="dosubmit" class="btn btn-xs btn-info">提交</div>
                </div>
            </td>
        </tr>
    </table>
</form>

<!-- 实例化编辑器 -->
<script type="text/javascript">
/*  laydate({
        elem: '#laydate',
        format: 'YYYY-MM-DD hh:mm:ss', // 分隔符可以任意定义，该例子表示只显示年月
        festival: true,
        istoday: true,
        max: laydate.now(), //最大日期
        start: laydate.now('0, "YYYY-MM-DD hh:mm:ss"'),
        istime: true,
    });*/
</script>
@endsection