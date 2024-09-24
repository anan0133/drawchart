<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepository;
use App\Models\DcCustomer;
use Validator;
use Log;

class AdCusController extends Controller
{
    protected $repository;
    public function __construct(UserRepository $repository )
    {
        $this->repository = $repository;
    }

    /**
     * [getlist description]
     * @return [type] [description]
     */
    public function getlist()
    {
        $data = $this->repository->all();
        return view('admin.pages.user',compact('data'));
    }

    /**
     * [getedit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getedit($id)
    {
         $user = $this->repository->find($id);
        return view('admin.pages.user_edit')->with('user', $user);
    }

    /**
     * [postedit description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function postedit(Request $request, $id )
    {
        $validator = Validator::make($request->toArray(), [
            'name' => 'required|max:128',
            'NewPassword' => 'nullable|min:6|max:20|confirmed',
        ]);
        if ($validator->fails() == null) {

            try 
            {
                $input = $request->all();
                
                if ($request->input('txtNewPassword')) {
                    $input['password'] = bcrypt($request->input('txtNewPassword'));
                }

                // Update admin
                $this->repository->update($input, $id);
                
            } catch (\Exception $e) {
            	\Log::error($e);
               return redirect(route('admin.user.getlist'))->with('msg', 'Has error!!!'.$e.'j');
            }
        } else {
        	
            return redirect(route('admin.user.getedit', $id))
                ->withErrors($validator)
                ->withInput();
        }
        return redirect(route('admin.user.getlist'))->with('msg', 'Update User success!!!');
    }

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
    public function delete($id)
    {
        $response = ['result' => 1,
                     'title' => __('messages.title_delete_success'),
                     'text' => __('messages.text_delete_success', ['name_object' => __('messages.faq')])];
        try {
            $this->repository->delete($id);
        } catch (\Exception $e) {
            $msg = 'Xảy ra lỗi.';
            $response['result'] = 0;
            $response['title'] = __('messages.title_delete_fail');
            $response['text'] = __('messages.text_delete_fail', ['name_object' => __('messages.faq')]);
        }
        // 1: success, 0: error -> fail
        return response()->json($response);
    }
}
  