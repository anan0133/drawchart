<form action="{{ route('admin.setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
	<div class="form-group">
        <label class="text-bold">@lang('text.lbl.name')</label>
        <input type="text" class="form-control" name="name" value="{{$setting->name}}" readonly>
    </div>
    <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
        <label class="text-bold">@lang('text.lbl.value') </label><span class="text-danger" title="Bắt buộc nhập" > *</span>
        <input type="text" class="form-control" name="value" value="{{$setting->value}}">
    </div>
    <div class="text-right">
        <a value="" class="btn btn-default btn-cancel" role="button">@lang('text.btn.cancel')</a>
        <button type="submit" class="btn bg-slate-700" >@lang('text.btn.ok')</button>
    </div>
</form>