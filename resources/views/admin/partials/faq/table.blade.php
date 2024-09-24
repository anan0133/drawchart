<table class="table responsive datatable-save-state">
     <thead>
	    <tr class="bg-teal-400">
	        <th>#</th>
	        <th>@lang('text.lbl.name')</th>
	        <th>@lang('text.lbl.content')</th>
	        <th>@lang('text.lbl.reply')</th>
	        <th>@lang('text.lbl.receive_at')</th>
	        <th>@lang('text.lbl.status')</th>
	        <th class="text-center">@lang('text.lbl.action')</th>
	    </tr>
	</thead>
	<tbody>
	@foreach ($data as $index => $faq)
	    <tr>
	    	<td>{{ $index +1 }}</td>
	        <td>
	            <b>{{ $faq["name"] }}<br/></b>
	            <a>{{ $faq["email"] }}</a>
	        </td>
	         <td align="left">{{ str_limit($faq["content"], $limit = 50, $end = '...') }}</td>
            <td align="left">{{ str_limit($faq["reply"], $limit = 50, $end = '...') }}</td>
            <td>
            	<span class=" text-muted">{{ $faq["created_at"] }}</span>
            	@if(!($faq["status"]))
            		<span class=" text-success">{{$faq["updated_at"]}}</span>
            	 @endif	
        	</td>
	        <td>
	        	@if(!($faq["status"]))
                    <span class="label label-danger">@lang('text.hdr.not_respond')</span>
                @else
                    <span class="label label-success">@lang('text.hdr.respond')</span><br />
                    <a>{{$faq["id_user"]? $faq->user->name:''}}	</a>
                @endif
	        </td>
	        <td class="text-center">
	            <a href="{{ route('admin.faq.edit', $faq->id) }}"><i class="icon-pencil7 btn text-primary-600"></i></a>
                <a href="{{ route('admin.faq.delete', $faq->id) }}" class="btn-delete" data-method="delete" data-src=""><i class="icon-trash btn text-danger-600"></i></a>
	        </td>
	    </tr>
	    @endforeach
	</tbody>
</table>