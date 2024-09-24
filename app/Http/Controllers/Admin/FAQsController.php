<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\FaqRepository;
use App\Mail\FaqsMail;
use Validator;
use Mail;
use Auth;
use Log;

class FAQsController extends Controller
{
	protected $repository;
    public function __construct(FaqRepository $repository )
    {
        $this->repository = $repository;
    }

    // Route::get('/', 'admin.faqs.getlist', 'FAQsController@getlist']);
    public function index()
    {
    	
        $data = [];
        try
        {
            $data = $this->repository->all();
            
        }
        catch(\Exception $e)
        {
            Log::error($e);
        }
        return view('admin.pages.faq_list',compact('data'));
    }
    public function edit($id)
    {
        $faq = null;
        try
        {
            $faq = $this->repository->find($id);
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.error')];
        }

        if(!$faq)
        {
            if(!isset($response))
                $response = ['code' => 0, 'msg' => __('messages.get_fail', ['name_object' => __('messages.faq')])];
            
            return redirect()->route('admin.faq.index')->with('result', $response);
        }

       return view('admin.pages.faq_model', compact('faq'));

    }

    /**
     * [DELETE] delete object
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delete($id)
    {
        try
        {   
            $res = $this->repository->delete($id);
            if($res)
            {
                $response = ['code' => 1, 'msg' => __('messages.delete_success', ['name_object' => __('messages.faq')])];
            }
            else
            {
                $response = ['code' => 0, 'msg' => __('messages.delete_fail', ['name_object' => __('messages.faq')])];
            }
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.get_fail', ['name_object' => __('messages.faq')])];
        }
        return response()->json($response);
    }


    public function email(Request $request)
    {
        $validator = Validator::make($request->toArray(), [
            'reply' => 'required'
        ]);
        if ($validator->fails() == null) {
            $id = $request->id;
            try {
                $request["status"] = 2;
                $request["id_user"] = Auth::guard('admin')->user()->id;
                $faq = $this->repository->update($request->toArray(), $id);
                $mail = $faq->email;

                Mail::to($mail)->send(new FaqsMail($faq));

               $response = ['code' => 1, 'msg' => __('messages.update_success', ['name_object' => __('messages.faq')])];
            } catch (\Exception $e) {
                Log::error($e);
                $response = ['code' => 0, 'msg' => __('messages.error')];
            }
            return redirect()->route('admin.faq.index')->with('result', $response);
        }else {
            return redirect(route('admin.faq.edit', $request->id))
                ->withErrors($validator)
                ->withInput();
        }
    }
}
