<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Contracts\SettingRepository;
use App\Models\Setting;
use App\Http\Requests\SettingRequest;
use Log;
use Auth;

class SettingController extends Controller
{
    //
    protected $settingRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepo = $settingRepo;
    }

    public function index()
    {
        $settings = [];
        try
        {
            $settings = $this->settingRepo->all();
        }
        catch(\Exception $e)
        {
            Log::error($e);
        }
        
        return view('admin.pages.setting_list', compact('settings'));
    }

    public function edit($id)
    {

        $setting = null;
       
        try
        {
            $setting = $this->settingRepo->find($id);
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.error')];
        }

        if(!$setting)
        {
            if(!isset($response))
                $response = ['code' => 0, 'msg' => __('messages.get_fail', ['name_object' => __('messages.setting')])];
            
            return redirect()->route('admin.setting.index')->with('result', $response);
        }

        return view('admin.pages.setting_model', compact('setting'));
    }

    public function update(SettingRequest $request, $id)
    {
        try
        {
            $this->settingRepo->update($request->toArray(), $id);
            $response = ['code' => 1, 'msg' => __('messages.update_success', ['name_object' => __('messages.setting')])];
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.update_fail', ['name_object' => __('messages.setting')])];
        }

        return redirect()->route('admin.setting.index')->with('result', $response);
    }
}
