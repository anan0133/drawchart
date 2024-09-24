@if($type->id)
    <?php $action = route('admin.type.update', $type->id); ?>
@else
    <?php $action = route('admin.type.store'); ?>
@endif
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
    <div class="form-group {{$errors->has('key') ? 'has-error' : ''}} ">
        <label class="text-bold">@lang('text.lbl.key'):</label><span class="text-danger" title="Bắt buộc nhập" > *</span>
        <input type="text" class="form-control" name="key" placeholder="@lang('text.plh.topic_key')" value="{{ old('key', $type->key) }}">
        @if ($errors->has('key'))
            <span class="help-block">
                <strong>{{ $errors->first('key') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('name_en') ? 'has-error' : ''}} ">
        <label class="text-bold">@lang('text.lbl.name_en'):</label><span class="text-danger" title="Bắt buộc nhập" > *</span>
        <input type="text" class="form-control" name="name_en" placeholder="@lang('text.plh.topic_name_en')" value="{{ old('name_en', $type->name_en) }}">
        @if ($errors->has('name_en'))
            <span class="help-block">
                <strong>{{ $errors->first('name_en') }}</strong>
            </span>
        @endif
    </div> 
    <div class="form-group {{$errors->has('name_vi') ? 'has-error' : ''}} ">
        <label class="text-bold">@lang('text.lbl.name_vi'):</label><span class="text-danger" title="Bắt buộc nhập" > *</span>
        <input type="text" class="form-control" name="name_vi" placeholder="@lang('text.plh.topic_name_vi')" value="{{ old('name_vi', $type->name_vi) }}">
        @if ($errors->has('name_vi'))
            <span class="help-block">
                <strong>{{ $errors->first('name_vi') }}</strong>
            </span>
        @endif
    </div> 

    <div class="form-group">
        <label class="text-bold">@lang('text.lbl.topic_parent'):</label><span class="text-danger" title="Bắt buộc nhập" > *</span>
        <select class="select" name="parent_id">
        	<?php $name_locale = 'name'.'_'.App::getLocale(); ?>
            @foreach ($list_parent as $index => $item)
            <option value="{{$item->id}}" 
            	{{$item->id == $type->parent_id? 'selected':''}}>{{$item->$name_locale}}
            </option>
            @endforeach
        </select>
    </div>
	<div class="form-group {{$errors->has('file_thumbnail') ? 'has-error' : '' }}">
        <label class="text-bold">@lang('text.lbl.thumbnail')</label><span class="text-danger" title="Bắt buộc nhập" > *</span>
        <input type="file" class="file-input" name="file_thumbnail" @if($type->thumbnail) value="{{  $type->thumbnail }}"@endif>
        <input type="hidden" name="old_file_name" value="{{ $type->thumbnail }}">
         @if ($errors->has('file_thumbnail'))
            <span class="help-block">
                <strong>{{ $errors->first('file_thumbnail') }}</strong>
            </span>
        @endif
    </div>
    <div class="text-right">
        <a value="" class="btn btn-default btn-cancel" role="button">@lang('text.btn.cancel')</a>
        <button type="submit" class="btn bg-teal-700" >@lang('text.btn.save')</button>
    </div>
</form>