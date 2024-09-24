<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use App\Models\Faq;
use App\Models\User;


use Log;

class HomeController extends Controller
{

    /**
     * [GET] 
     * @return [view] [description]
    */
    public function index()
    {
    	$faq_list = Faq::where('status', 0)->get();
    	$chart_list = Chart::orderBy('created_at', 'desc')->take(6)->get();
    	$user_list = User::where('is_admin', 0)->orderBy('created_at', 'desc')->take(4)->get();

        return view('admin.pages.dashboard', compact('faq_list', 'chart_list', 'user_list'));
    }
}
