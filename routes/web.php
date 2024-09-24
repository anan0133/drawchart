<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

//Login
Route::get('/', 'CustomerController@index')->name('customer.index');
Route::post('/register', 'CustomerController@register')->name('customer.register');
Route::post('/login', 'CustomerController@login')->name('customer.login');
Route::get('/logout', 'CustomerController@logout')->name('customer.logout');
//save image into system  
Route::post('/save', 'CustomerController@save')->name('customer.save');
//get form 
Route::get('/getform/{id}', 'CustomerController@getform')->name('customer.getform');
Route::get('/mycollect', 'CustomerController@mycollect')->name('customer.mycollect');
Route::get('/mycollect/delete/{id}', 'CustomerController@delmycollect')->name('customer.delmycollect');

//import 
Route::post('/import', 'CustomerController@importExcel')->name('customer.importExcel');
Route::post('/contact', 'CustomerController@contact')->name('customer.contact');
Route::get('/home', function () {
    return view('welcome');
});
Route::get('/setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('locale');

/** Read file from external */
Route::get('/file/{type}/{filename}', function ($type, $filename)
{
    $path = storage_path('app/file/' . $type . '/' . $filename);
    
    if (!File::exists($path)) {
        abort(404);
    }

    /*
    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
	**/
	return response()->file($path);
})->where('filename', '.*');

/** Admin scope */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    /** Login */
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.showLogin');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login');
    /** Forgot password */
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    /** Reset password */
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
   

    Route::get('logout', function () {
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect('/');
    })->name('logout');

    /** Auth of admin */
    Route::group(['middleware' => ['auth.admin']], function () {
        /** Home */
        Route::get('/', 'HomeController@index')->name('admin.home.index');
        /** Permission */
        Route::get('quyen-han', 'PermissionController@index')->name('admin.permission.index');
        /** User */
        Route::get('nguoi-dung', 'UserController@index')
            ->name('admin.user.index')
            ->middleware('permission:view_user');
        Route::get('nguoi-dung/them', 'UserController@create')
            ->name('admin.user.create')
            ->middleware('permission:create_user');
        Route::post('nguoi-dung/them', 'UserController@store')
            ->name('admin.user.store')
            ->middleware('permission:create_user');
        Route::get('nguoi-dung/cap-nhat/{id}', 'UserController@edit')
            ->name('admin.user.edit')
            ->middleware('permission:edit_user');;
        Route::post('nguoi-dung/cap-nhat/{id}', 'UserController@update')
            ->name('admin.user.update')
            ->middleware('permission:edit_user');;
        Route::delete('nguoi-dung/xoa/{id}', 'UserController@delete')
            ->name('admin.user.delete')
            ->middleware('permission:delete_user');

       
        /** Setting */
        Route::get('cai-dat', 'SettingController@index')
            ->name('admin.setting.index')
            ->middleware('permission:view_setting');
        Route::get('cai-dat/cap-nhat/{id}', 'SettingController@edit')
            ->name('admin.setting.edit')
            ->middleware('permission:edit_setting');
        Route::post('cai-dat/cap-nhat/{id}', 'SettingController@update')
            ->name('admin.setting.update')
            ->middleware('permission:edit_setting');
            
        Route::delete('cai-dat/trang-thai/{id}', 'SettingController@active')
            ->name('admin.setting.active'); 

        /** Chart */
        Route::get('bieu-do', 'ChartController@index')
            ->name('admin.chart.index')
            ->middleware('permission:view_chart');
        Route::get('bieu-do/them', 'ChartController@create')
            ->name('admin.chart.create')
            ->middleware('permission:create_chart');
        Route::post('bieu-do/them', 'ChartController@store')
            ->name('admin.chart.store')
            ->middleware('permission:create_chart');
        Route::get('bieu-do/cap-nhat/{id}', 'ChartController@edit')
            ->name('admin.chart.edit')
            ->middleware('permission:edit_chart');
        Route::post('bieu-do/cap-nhat/{id}', 'ChartController@update')
            ->name('admin.chart.update')
            ->middleware('permission:edit_chart');
        Route::post('bieu-do/cap-nhat/slide/{id}', 'ChartController@slide')
            ->name('admin.chart.slide')
            ->middleware('permission:slide_chart');
        Route::post('bieu-do/cap-nhat/collect/{id}', 'ChartController@collect')
            ->name('admin.chart.collect')
            ->middleware('permission:collect_chart');
        Route::delete('bieu-do/xoa/{id}', 'ChartController@delete')
            ->name('admin.chart.delete')
            ->middleware('permission:delete_chart');

        /** Type */
        Route::get('loai', 'TypeController@index')
            ->name('admin.type.index')
            ->middleware('permission:view_type');
        Route::get('loai/them', 'TypeController@create')
            ->name('admin.type.create')
            ->middleware('permission:create_type');
        Route::post('loai/them', 'TypeController@store')
            ->name('admin.type.store')
            ->middleware('permission:create_type');
        Route::get('loai/cap-nhat/{id}', 'TypeController@edit')
            ->name('admin.type.edit')
            ->middleware('permission:edit_type');
        Route::post('loai/cap-nhat/{id}', 'TypeController@update')
            ->name('admin.type.update')
            ->middleware('permission:edit_type');
        Route::delete('loai/xoa/{id}', 'TypeController@delete')
            ->name('admin.type.delete')
            ->middleware('permission:delete_type');

        /** FAQs */
        Route::get('cau-hoi', 'FAQsController@index')
            ->name('admin.faq.index')
            ->middleware('permission:view_faq');
        Route::get('cau-hoi/cap-nhat/{id}', 'FAQsController@edit')
            ->name('admin.faq.edit')
            ->middleware('permission:edit_faq');
        Route::post('cau-hoi/cap-nhat/{id}', 'FAQsController@email')
            ->name('admin.faq.email')
            ->middleware('permission:edit_faq');
        Route::delete('cau-hoi/xoa/{id}', 'FAQsController@delete')
            ->name('admin.faq.delete')
            ->middleware('permission:delete_faq');

    });

});
?>