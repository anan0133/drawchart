<table class="table responsive datatable-save-state">
     <thead>
	    <tr class="bg-teal-400">
	        <th>#</th>
	        <th>@lang('text.lbl.icon')</th>
	        <th>@lang('text.lbl.name_en')</th>
	        <th>@lang('text.lbl.name_vi')</th>
	        <th>@lang('text.lbl.topic_parent')</th>
	        <th>@lang('text.lbl.key')</th>
	        <th class="text-center">@lang('text.lbl.action')</th>
	    </tr>
	</thead>
	<tbody>
	@foreach ($type_list as $index => $type)
	    <tr>
	    	<td>{{ $index +1 }}</td>
	        <td>
	            @if($type["parent_id"] == null)
	            	<a href="" class="btn bg-indigo-400 btn-rounded btn-icon btn-xs">
	            	<span class="letter-icon">#{{ $index +1 }}</span>
	            @else
	               <img src="{{ URL::asset($type['thumbnail'])}}" alt="" class="img-rounded img-preview" onerror="this.src='{{ URL::asset("assets/admin/images/placeholder.jpg") }}'" />
	            @endif
	        </td>
	        <td>{{ $type["name_en"] }}</td>
	        <td>{{ $type["name_vi"] }}</td>
	        <td>
	        	<?php $name_locale = 'name'.'_'.App::getLocale(); ?>
	        	@if($type["parent_id"] == null)
	                <span class="label label-success">Topic parent</span>
	            @else
	               {{ $type->parent->$name_locale }}
	            @endif
	        </td>
	        <td>
				{{$type["key"]}}							   
	        </td>
	        <td class="text-center">
                <a href="{{ route('admin.type.edit', $type->id) }}" ><i class="icon-pencil7 btn text-primary-600"></i></a>
                <a href="{{ route('admin.type.delete', $type->id) }}" class="btn-delete" data-method="delete" data-src=""><i class="icon-trash btn text-danger-600"></i></a>
	        </td>
	    </tr>
	    @endforeach
	</tbody>
</table>