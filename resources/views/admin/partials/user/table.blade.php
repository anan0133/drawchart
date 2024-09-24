<table class="table responsive datatable-save-state">
    <thead>
        <tr class="bg-teal-400">
            <th>#</th>
            <th class="no-padding nosort">@lang('text.lbl.image')</th>
            <th>@lang('text.lbl.name')</th>
            <th>@lang('text.lbl.email')</th>
            <th>@lang('text.lbl.created_at')</th>
            <th>@lang('text.lbl.lastest_active_at')</th>
            <th>@lang('text.lbl.is_admin')</th>
            <th>@lang('text.lbl.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $ind => $user)
        	@if(!$user->is_root)
            <tr>
                <td>{{ $ind + 1 }}</td>
                <td class="no-padding">
                @if($user->avatar)
                    <img src="{{ $user->avatar}}" class="img-sm" alt="">
                @else
                    <img src="https://robohash.org/{{$user->name}}.png?set=set4&size=30x30" >
                @endif</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->last_login }}</td>
                <td>
                	@if($user->is_admin == 1)
                	<span class="label label-success">@lang('text.lbl.is_admin')</span>
                	@else
                	<span class="label label-default">@lang('text.lbl.no_admin')</span>
                	@endif
                </td>
                <td >
                    <a href="{{ route('admin.user.edit', $user->id) }}"><i class="icon-pencil7 btn text-primary-600"></i></a>
                    <a href="{{ route('admin.user.delete', $user->id) }}"  class="btn-delete" data-method="delete" data-src=""><i class="icon-trash btn text-danger-600"></i></a>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>