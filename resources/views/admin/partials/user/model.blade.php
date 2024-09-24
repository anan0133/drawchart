@if($user->id)
    <?php $action = route('admin.user.update', $user->id); ?>
@else
    <?php $action = route('admin.user.store'); ?>
@endif
<form action="{{$action}}" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
	<div class="form-group">
        <label class="text-bold">
            @lang('text.lbl.is_admin')  
             <input type="checkbox" class="switch" name="is_admin" @if($user->is_admin == 1) checked @endif >
        </label>
    </div>
	<div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
        <label class="text-bold">@lang('text.lbl.name') </label> <span class="text-danger" title="Bắt buộc nhập" > *</span>
        <input type="text" class="form-control" name="name" placeholder="@lang('text.plh.name')" value="{{ old('name', $user->name) }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
        <label class="text-bold">@lang('text.lbl.email') </label><span class="text-danger" title="Bắt buộc nhập" > *</span>
        <input type="text" class="form-control" name="email" placeholder="@lang('text.plh.email')" value="{{ old('email', $user->email) }}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('password') ? 'has-error' : '' }}">
        <label class="text-bold">@lang('text.lbl.password') </label>
        <input type="password" class="form-control" name="password" placeholder="@lang('text.plh.password')" value="">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
   	<div class="form-group {{$errors->has('password_confirmation') ? 'has-error' : '' }}">
	   	<label class="text-bold">@lang('text.lbl.password_confirmation')</label>
	   	<input type="password" class="form-control" name="password_confirmation" placeholder="@lang('text.plh.password_confirmation')" value="">
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
	</div>
	<div class="form-group {{$errors->has('file_avatar') ? 'has-error' : '' }}">
        <label class="text-bold">@lang('text.lbl.avatar')</label>
        <input type="file" class="file-input" name="file_avatar" @if($user->avatar) value="{{  $user->avatar }}"@endif>
        <input type="hidden" name="old_file_name" value="{{ $user->avatar }}">
         @if ($errors->has('file_avatar'))
            <span class="help-block">
                <strong>{{ $errors->first('file_avatar') }}</strong>
            </span>
        @endif
    </div>
    @if($user->is_admin)
    <div class="form-group">
        <label class="display-block text-bold">@lang('text.lbl.permission')</label>
        <?php
            $namePermissions = config('define.name_permissions');
            foreach($namePermissions as $namePermission)
            {
                $$namePermission = $permissions->filter(function ($value, $key) use ($namePermission) {
                    return ends_with($value->name, $namePermission);
                });
            }
        ?>
        @foreach($namePermissions as $ind => $namePermission)
            <fieldset class="content-group">
                <legend class="text-semibold"><em> @lang('messages.'.$namePermission)</em>
                <ul class="icons-list" style="float:right">
                    <li><a data-action="expend" data-target="#id_permissions_{{$ind}}" class="rotate-180"><i class="fa fa-caret-up"></i></a></li>
                </ul>
                </legend>
                
                <div id="id_permissions_{{$ind}}" class="row" style="display:none">
                @foreach($$namePermission as $iPermission)
                    <div class="col-md-6">
                        <div class="checkbox checkbox-switch">
                            <label>
                                <input type="checkbox" class="switch" name="permissions[]" value="{{$iPermission->name}}" data-on-text="@lang('text.btn.on')" data-off-text="@lang('text.btn.off')" data-size="mini"
                                    @if(!empty($userPermissions) and in_array($iPermission->id, $userPermissions)) checked @endif>
                                @lang('text.'.$iPermission->name)
                            </label>
                        </div>
                    </div>
                @endforeach
                </div>
            </fieldset>
        @endforeach
    </div>
    @endif
    <div class="text-right">
        <a value="" class="btn btn-default btn-cancel" role="button">@lang('text.btn.cancel')</a>
        <button type="submit" class="btn bg-slate-700" >@lang('text.btn.save')</button>
    </div>
</form>