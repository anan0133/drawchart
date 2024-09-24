<?php $action = route('admin.faq.email', $faq->id); ?>
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
    <div class="form-group">
        <label class="text-bold">@lang('text.hdr.name_send')</label>
        <input class="form-control" name="fullname" value="{{$faq['name']}}" readonly>
    </div>
    <div class="form-group">
        <label class="text-bold">@lang('text.hdr.email_send')</label>
        <input class="form-control" name="email" value="{{$faq['email']}}" readonly>
    </div>
    <div class="form-group">
        <label class="text-bold">@lang('text.hdr.content_faqs')</label>
        <textarea class="form-control" rows="3" name="content" readonly >{{ old('content', isset($faq)? $faq['content']: '') }}</textarea>
    </div>

    <div class="form-group  {{$errors->has('reply') ? 'has-error' : '' }}">
        <label class="text-bold">@lang('text.hdr.content_answer')</label> <span class="text-danger" title="Required" > *</span>
        <textarea class="form-control" rows="3" name="reply" >{{ old('reply', isset($faq)? $faq['reply']: '') }}</textarea>
        @if ($errors->has('reply'))
            <span class="help-block">
                <strong>{{ $errors->first('reply') }}</strong>
            </span>
        @endif
    </div>
    <div class="text-right">
        <a class="btn btn-default btn-cancel" role="button">@lang('text.btn.cancel')</a>
        <button type="submit" class="btn btn-teal"><i class="glyphicon glyphicon-send"></i>&nbsp;@lang('text.btn.send_mail')</button>
    </div>
</form>