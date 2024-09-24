@if($chart->id)
    <?php $action = route('admin.chart.update', $chart->id); ?>
@else
    <?php $action = route('admin.chart.store'); ?>
@endif
<form action="{{$action}}" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
	<div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
        <label class="text-bold">@lang('text.lbl.title')</label><span class="text-danger" title="Bắt buộc nhập" > *</span>
        <input type="text" class="form-control" name="title" placeholder="@lang('text.plh.title_chart')" value="{{ old('title', $chart->title) }}">
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif                                       
    </div> 
    <div class="form-group">
        <label class="text-bold">@lang('text.lbl.type')</label><span class="text-danger" title="Bắt buộc nhập" > *</span>
        <?php $name_locale = 'name'.'_'.App::getLocale(); ?>
        <select class="select" name="type_id">
            @foreach ($type_list as $index => $item)
            <option value="{{$item->id}}" {{$item->id == $chart->type_id? 'selected':''}} >{{$item->$name_locale}}</option>
            @endforeach
        </select>
    </div> 
	<div class="row">
    	<div class="col-md-6">
            <div class="form-group">
            	<label class="text-bold">@lang('text.hdr.display_slider')</label>
            	<input style="margin-left: 10px" class="styled" type="checkbox" name="display_slide"
            	{{ $chart->display_slide ? 'checked':''}}>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            	<label class="text-bold">@lang('text.hdr.display_collection')</label>
            	<input style="margin-left: 10px" class="styled" type="checkbox" name="display_collect" {{ $chart->display_collect ? 'checked':''}}>
            </div>
        </div>
    </div>
    
	<div class="form-group {{$errors->has('file_thumbnail') ? 'has-error' : '' }}">
        <label class="text-bold">@lang('text.lbl.thumbnail')</label><span class="text-danger" title="Bắt buộc nhập" > *</span>
        <input type="file" class="file-input" name="file_thumbnail" @if($chart->thumbnail) value="{{  $chart->thumbnail }}"@endif>
        <input type="hidden" name="old_file_name" value="{{ $chart->thumbnail }}">
         @if ($errors->has('file_thumbnail'))
            <span class="help-block">
                <strong>{{ $errors->first('file_thumbnail') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="text-right">
        <a value="" class="btn btn-default btn-cancel" role="button">@lang('text.btn.cancel')</a>
        <button type="submit" class="btn bg-slate-700" >@lang('text.btn.save')</button>
    </div>
</form>