<table class="table datatable-save-state">
    <thead>
        <tr class="bg-teal-400">
        	<th>#</th>
            <th  style="width: 200px !important;" class="nosort">@lang('text.lbl.preview')</th>
            <th>@lang('text.lbl.title')</th>
            <th>@lang('text.lbl.author')</th>
            <th>@lang('text.lbl.created_at')</th>
            <th class="nosort text-center">@lang('text.lbl.slider')<br/>@lang('text.lbl.collection')</th>
            <th class="nosort text-center">@lang('text.lbl.action')</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($chart_list as $index => $item)
        <tr>
        	<td>{{ $index +1 }}</td>
            <td>
                <img src="{{ $item['thumbnail']}}" alt="{{ $item['title']}}" class="img-rounded img-preview">
            </td>
            <td>{{ str_limit($item["title"], $limit = 50, $end = '...') }}</td>
            <td> {{ $item->user->name}} </td>
            <td> {{ $item["created_at"] }} </td>
            <td >
            	<div class="checkbox checkbox-switch">
                    <label>
                        <input type="checkbox" class="switch chb-publish" name="publish" 
		            	data-href="{{ route('admin.chart.slide', $item['id'])}}" 
		            	data-on-color="info" data-off-color="default" data-size="mini" 
		            	data-on-text="Slide&nbsp;&nbsp;&nbsp;" data-off-text="No"
		            	{{$item['display_slide']?'checked':''}}>
                    </label>
                </div>
            	<div class="checkbox checkbox-switch">
                    <label>
                        <input type="checkbox" class="switch chb-publish" name="publish" 
		            	data-href="{{ route('admin.chart.collect', $item['id'])}}" 
		            	data-on-color="success " data-off-color="default" data-size="mini" 
		            	data-on-text="Collect" data-off-text="No"
		            	{{$item['display_collect']?'checked':''}}>
                    </label>
                </div>
            </td>
            <td class="text-center">
                <a href="{{ route('admin.chart.edit', $item->id) }}" ><i class="icon-pencil7 btn text-primary-600"></i></a>
                <a href="{{ route('admin.chart.delete', $item->id) }}" class="btn-delete" data-method="delete" data-src=""><i class="icon-trash btn text-danger-600"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>