<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials._shared.head')
</head>

<body>
    <!-- Header -->
    <div class="navbar navbar-inverse">
        @include('admin.partials._shared.header')
    </div>
    <!-- /header -->
    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">          
            <!-- Main side bar -->
            <div class="sidebar sidebar-main">
                @include('admin.partials._shared.navbar')
            </div>
            <!-- /main side bar -->
            <!-- Main content -->
            <div class="content-wrapper">
                @yield('content')               
                <div class="footer text-muted" style="margin-left: 30px;">
                    &#64; 2015. Limitless Web App Kit by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a><br/>
                    Handcrafted by <strong>Draw Chart</strong>
                </div>
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
    </div>
    @if($errors->any())
        <input type="hidden" name="form_errors" value="{{ json_encode($errors->toArray()) }}">
    @endif
    <?php
    if (!session('edit_previous_button'))
    {
        session(['edit_previous_button' => url()->previous()]);
    } else if(session('edit_previous_button') != url()->previous()) {
        session(['edit_previous_button' => url()->previous()]);
    }
    ?>
    <input type="hidden" name="edit_previous_button" value="{{ session('edit_previous_button') }}">
    <!-- /page container -->
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/loaders/pace.min.js') }}"></script>
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/loaders/blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/notifications/pnotify.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/styling/switch.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    
    @yield('scripts')
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            /** notify from reponse */
            var responseMsg = <?php echo json_encode(session('result')) ?: '' ?>;
            showNotification(responseMsg);

            if($('input[name=form_errors]').length && $('form.post_submission').length) {
                var errors = $('input[name=form_errors]').val();
                
                association_errors(JSON.parse(errors), $('form.post_submission'));
            }
        });
    </script>
</body>
</html>