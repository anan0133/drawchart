/* ------------------------------------------------------------------------------
*
*  # Basic datatables
*
*  Specific JS code additions for datatable_basic.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{ 
            orderable: false/*,
            width: '100px',
            targets: [ 5 ]*/
        },
        {targets: [-1], orderable: false},
        {targets: ['nosort'], orderable: false}],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Tìm kiếm:</span> _INPUT_',
            lengthMenu: '<span>Hiển thị:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' },
            emptyTable: '<span>Không có dữ liệu</span>',
            zeroRecords: '<span>Không tìm thấy dữ liệu</span>'
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        },
        infoCallback: function(settings, start, end, max, total, pre){
            if (total == 0) {
                $('a.paginate_button').addClass('hide');
                return "";
            }
            return "Hiển thị " + start + " đến " + end + " của " + total + " mục"
                + ((total !== max) ? " (Tìm từ " + max + " mục)" : "");
        }
    });


    // Basic datatable
    $('.datatable-basic').DataTable();

    // Alternative pagination
    $('.datatable-pagination').DataTable({
        pagingType: "simple",
        language: {
            paginate: {'next': 'Next &rarr;', 'previous': '&larr; Prev'}
        }
    });


    // Datatable with saving state
    $('.datatable-save-state').DataTable({
        stateSave: true
    });


    // Scrollable datatable
    $('.datatable-scroll-y').DataTable({
        //autoWidth: true,
        //scrollY: 300
    });

    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Nhập nội dung cần tìm...');


    // add css select for the length option
    $('.dataTables_length select').addClass('form-control input-sm');
    $('.dataTables_length select').css('width', 'auto');
});
