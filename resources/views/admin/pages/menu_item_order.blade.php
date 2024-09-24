@extends('admin.layouts.master')
@section('content')
<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">@lang('text.hdr.order_menu_item')</span></h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        {!! Breadcrumbs::render('order_menu_item') !!}
    </div>
</div>
<!-- /page header -->
<!-- Content area-->
<div class="col-md-offset-2">
    <div class="content">
        <div class="panel panel-white col-md-8">
            <div class="panel-heading">
                <h6 class="panel-title">
                    @lang('text.hdr.order_menu_item')
                </h6>
            </div>
            <div class="panel-body">
                <?php
                function tree_element($entry, $key, $all_entries)
                {
                    if (!isset($entry->tree_element_shown)) {
                        // mark the element as shown
                        $all_entries[$key]->tree_element_shown = true;
                        $entry->tree_element_shown = true;

                        // show the tree element
                        echo '<li id="list_'.$entry->getKey().'">';
                        echo '<div><span class="disclose"><span></span></span>'.$entry->name.'</div>';

                        // see if this element has any children
                        $children = [];
                        foreach ($all_entries as $key => $subentry) {
                            if ($subentry->parent_id == $entry->getKey()) {
                                $children[] = $subentry;
                            }
                        }

                        $children = collect($children)->sortBy('lft');

                        // if it does have children, show them
                        if (count($children)) {
                            echo '<ol>';
                            foreach ($children as $key => $child) {
                                $children[$key] = tree_element($child, $child->getKey(), $all_entries);
                            }
                            echo '</ol>';
                        }
                        echo '</li>';
                    }

                    return $entry;
                }

                ?>
                <ol class="sortable">
                    <?php
                    $all_entries = collect($menuItems)->sortBy('lft')->keyBy('id');
                    $root_entries = $all_entries->filter(function ($item) {
                        return $item->parent_id == 0;
                    });
                    foreach ($root_entries as $key => $entry){
                        $root_entries[$key] = tree_element($entry, $key, $all_entries);
                    }
                    ?>
                </ol>
                <a id="toArray" class="btn bg-slate-700 btn-icon heading-btn"><i class="icon-floppy-disk position-left"></i><b>@lang('text.btn.save')</b></a>
            </div>
        </div>
    </div>
</div>
<!-- /content area-->
@stop
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/tags/tokenfield.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/styling/switch.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/app.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/pages/form_tags_input.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/pages/menu.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/jquery.mjs.nestedSortable.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.switch').bootstrapSwitch();

        $('.sortable').nestedSortable({
            forcePlaceholderSize: true,
            handle: 'div',
            helper: 'clone',
            items: 'li',
            opacity: .6,
            placeholder: 'placeholder',
            revert: 250,
            tabSize: 25,
            tolerance: 'pointer',
            toleranceElement: '> div',
            maxLevels: 3,

            isTree: true,
            expandOnHover: 700,
            startCollapsed: false
        });

        $('#toArray').click(function(e){
                // get the current tree order
                arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});

                // log it
                //console.log(arraied);

                // send it with POST
                $.ajax({
                    url: '{{ route("admin.menu_item.save_order") }}',
                    type: 'POST',
                    data: { tree: arraied },
                })
                .done(function(res) {
                    console.log(res);
                    new PNotify({
                        title: "{{ trans('backpack::crud.reorder_success_title') }}",
                        text: "{{ trans('backpack::crud.reorder_success_message') }}",
                        type: "success"
                    });
                })
                .fail(function(res) {
                    console.log(res);
                    new PNotify({
                        title: "{{ trans('backpack::crud.reorder_error_title') }}",
                        text: "{{ trans('backpack::crud.reorder_error_message') }}",
                        type: "danger"
                    });
                })
                .always(function(res) {
                    console.log(res);
                });

            });
    })
</script>
<!-- /theme JS files -->
@stop