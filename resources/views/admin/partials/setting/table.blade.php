<table class="table table-bordered responsive datatable-save-state">
    <thead>
        <tr>
            <th style="width: 40px;">STT</th>
            <th>@lang('text.lbl.name')</th>
            <th>@lang('text.lbl.description')</th>
            <th>@lang('text.lbl.value')</th>
            <th>@lang('text.lbl.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($settings as $index => $item)
        	<tr>
        		<td>{{$index + 1}}</td>
        		<td>{{$item->name}}</td>
        		<td>{{$item->description}}</td>
                <td>{{$item->value}}</td>
        		<td>
        			<a href="{{ route('admin.setting.edit', $item->id) }}" ><i class="icon-pencil7 btn text-primary-600"></i></a>
		            
        		</td>
        	</tr>
        @endforeach
    </tbody>
</table>