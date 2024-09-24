/* ---------------------------------------
 * 
 *
 * 
 */
function showTopMessages(code, title, msg) {
    var stack_custom_top = { "dir1": "down", "dir2": "right", "push": "top", "spacing1": 1 };
    var type = 'info';

    if (code == '1') {
        type = 'success';
    } else if (code == '0') {
        type = 'error';
    }

    var opts = {
        text: '&nbsp;'+msg,
        // width: "100%",
        // cornerclass: "no-border-radius",
        // addclass: "stack-custom-top bg-primary",
        // stack: stack_custom_top,
        // text: 'Look at my beautiful styling! ^_^',
        type: 'info',
        styling: 'bootstrap3'
    };

    switch (type) {
        case 'error':
            opts.addclass = "bg-danger";
            opts.type = "error";
            break;

        case 'info':
            opts.addclass = "bg-info";
            opts.type = "info";
            break;

        case 'success':
            opts.addclass = "bg-success";
            opts.type = "success";
            break;
    }
    setTimeout(function() {
        new PNotify(opts);
    }, 500);
}

function showNotification(msg) {
    if(msg != undefined && msg != null && msg != '') {
        showTopMessages(msg.code, 'PNotify', msg.msg);
    }

}

$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    /* delete*/
    $(document).on('click', 'a.btn-delete', function(e) {
        e.preventDefault();
        //var title = 'Bạn chắc không?';
        //var text = 'Bạn có chắc muốn xóa không?';
        var title = 'Are you sure?';
        var text = 'Are you sure you want to delete?';
        var url = $(this).attr('href');
        var method = $(this).attr('data-method');
        var data = $(this).attr('data-src');

        swal({
                title: title,
                text: text,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                //confirmButtonText: "Đồng ý!",
                //cancelButtonText: "Không!",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: method,
                        url: url,
                        data: data,
                        success: function(res) {
                            setTimeout(function() {
                                window.location.reload(true);
                            }, 800);
                            showTopMessages(res.code, 'Halo!', res.msg);

                        },
                        error: function(res) {
                            showTopMessages(0, 'Error', 'Somethings went wrong!');
                            console.log(res);
                        }
                    });
                }
            }
        );
    });

    /* change status article  */
    $(document).on('switchChange.bootstrapSwitch', '.chb-publish', function() {
        var title = 'Are you sure?';
        //var title = 'Bạn chắc không?';
       // var text = 'Bạn có chắc rằng đây là điều bạn muốn?'
        var text = 'Are you sure this is what you want?'
        var url = $(this).attr('data-href');
        var target = $(this);
        $(target).bootstrapSwitch('state', !$(target).bootstrapSwitch('state'), true);
        swal({
                title: title,
                text: text,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                //confirmButtonText: "Đồng ý!",
                //cancelButtonText: "Không!",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: url,
                        success: function(res) {
                            // temp| load from filter | ajax
                            if (res.code == 1) {
                                setTimeout(function() {
                                    window.location.reload(true);
                                }, 800);
                            }
                            $(target).bootstrapSwitch('state', $(target).bootstrapSwitch('state'), true);
                            showTopMessages(res.code, 'Halo! You have a messages.', res.msg);
                        },
                        error: function(res) {
                            showTopMessages(0, 'Error', 'Somethings went wrong!');
                            console.log(res);
                        }
                    });
                }
            }
        );
    });
   
    $(document).on('submit', '.ajax_form', function(e) {
        e.preventDefault();
        var target = $(this);
        var modal = $(this).attr('data-modal');
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();
        
        $.ajax({
            type: method,
            url: url,
            data: data,
            success: function(res) {
                console.log(res);
                showTopMessages(res.code, 'Halo! You have a messages.', res.msg);
                if($(modal).length){
                    $(modal).modal('hide');
                    setTimeout(function() {
                        window.location.reload(true);
                    }, 1000);
                }
                
            },
            error: function(res) {
                if (res.status == 422) {
                    association_errors(res['responseJSON'], target);
                } else {
                    showTopMessages(0, 'Halo! You have a messages.', res.msg);
                }
            }
        });
    });

    /** Cancel button */
    $(document).on('click', '.btn-cancel', function(e) {
        var title = 'Are you sure?';
       // var title = 'Bạn chắc không?';
      //  var text = 'Bạn thật sự muốn hủy thay đổi?';
        var text = 'Do you really want to cancel the change?';
        var url = $('input[name="edit_previous_button"]').val();
        swal({
                title: title,
                text: text,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                //confirmButtonText: "Đồng ý!",
                //cancelButtonText: "Không!",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    sessionStorage.clear();
                    //window.history.back();
                    window.location.href = url;
                }
            });
    });

     /** button edit-modal */
   $(document).on('click', '.btn-edit-modal', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var target = $(this).attr('data-target');

        $.ajax({
            type: 'get',
            url: url,
            success:function(res) {
                console.log(res);
                if(res != null && res != undefined) {
                    $(target).html(res);
                }
            },
            error: function(res) {
                console.log(res);
            }
        });
    });

    var url = window.location;
    $('ul.navigation li').removeClass('active');
    $('ul.navigation a[href="' + url + '"]').parent().addClass('active');
    $('ul.navigation a').filter(function() {
        return this.href == url;
    }).parent('li').parents('ul').slideDown(function() {}).parent().addClass('active');
});


/** FUNCTION SUPPORT */
function association_errors(errors, target) {
    $(target).find('.has-error').removeClass('has-error');
    $(target).find('.help-block').html('');
    $.each(errors, function(k, v) {
        var input = $(target).find('[name=' + k + ']');
        var field = $(input).parents('.form-group');
        field.addClass('has-error');
        field.find('.help-block').html('<strong>' + v + '</strong>');
    });
}
