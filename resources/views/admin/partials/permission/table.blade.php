<table class="table table-bordered responsive datatable-save-state">
    <thead>
        <tr>
            <th style="width: 40px;">STT</th>
            <th>@lang('text.lbl.name')</th>
            <th>@lang('text.lbl.value')</th>
            <!-- <th style="width: 200px !important;">Hành động</th> -->
        </tr>
    </thead>
    <tbody>
    @foreach($permissions as $ind => $permission)
        <tr>
            <td>{{ $ind + 1 }}</td>
            <td>@lang('text.'.$permission->name)</td>
            <td>{{ $permission->name }}</td>
            <!-- <td>
                <a href="" class="btn border-slate text-slate-600 btn-flat btn-xs"><i class="icon-pencil7 position-left"></i>Sửa</a>
            </td> -->
        </tr>
    @endforeach
    </tbody>
</table>