<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\RoleRepository;
use App\Repositories\Contracts\PermissionRepository;
use App\Models\User;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Log;
use Auth;
use App\Helper\Upload;

class UserController extends Controller
{

    protected $userRepo,
              $roleRepo,
              $permissionRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepo,
                                RoleRepository $roleRepo,
                                PermissionRepository $permissionRepo)
    {
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
        $this->permissionRepo = $permissionRepo;
    }

    /**
     * [GET] 
     * @return [view] [description]
    */
    public function index()
    {
        $users = [];
        try
        {
            $users = $this->userRepo->all();
        }
        catch(\Exception $e)
        {
            Log::error($e);
        }

        return view('admin.pages.user_list', compact('define', 'users'));
    }

    /**
     * [GET] Create new object user with default value params
     * @return [view] [description]
     */
    public function create()
    {
        try {
            $user = new User;
            $userPermissions = $user->permissions->pluck('id')->toArray();
            $permissions = $this->permissionRepo->all();
        } catch (\Exception $e) {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.error')];
            return redirect()->route('user.index')->with('result', $response);
        }

    	return view('admin.pages.user_model', compact('user', 'userPermissions', 'permissions'));
    }

    /**
     * [POST] store object
     * @param  TagCreateRequest $request [description]
     * @return [type]                    [description]
     */
    public function store(UserCreateRequest $request)
    {
        try
        {
            $request['password'] = bcrypt($request['password']);
             //avatar
            if($file = $request->file('file_avatar'))
            	$request['avatar'] = Upload::AddAvatar($file);
            
            //is_admin
	        if($request['is_admin']){
	        	$request['is_admin'] = 1;
	        }else
	        	$request['is_admin'] = 0;

            $user = $this->userRepo->create($request->toArray());
            // Role/Permission
            if($request->permissions)
            {
                $user->givePermissionTo($request->permissions);
            }

            $response = ['code' => 1, 'msg' => __('messages.create_success', ['name_object' => __('messages.user')])];
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.create_fail', ['name_object' => __('messages.user')])];
        }
        return redirect()->route('admin.user.index')->with('result', $response);
    }

    /**
     * [GET] get object by id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $user = null;

        try
        {
            $user = $this->userRepo->find($id);
            $roles = $this->roleRepo->all();
            $userPermissions = $user->permissions->pluck('id')->toArray();
            $permissions = $this->permissionRepo->all();
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.error')];
        }

        if(!$user)
        {
            if(!isset($response))
                $response = ['code' => 0, 'msg' => __('messages.get_fail', ['name_object' => __('messages.user')])];
            
            return redirect()->route('admin.user.index')->with('result', $response);
        }

        return view('admin.pages.user_model', compact('user', 'userPermissions', 'permissions'));
    }

    /**
     * [POST] update object
     * @param  TagUpdateRequest $request [description]
     * @return [type]                    [description]
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try
        {
            $user = $this->userRepo->find($id);
            
            // Password
            if($request['password'])
            {
                $request['password'] = bcrypt($request['password']);
            }
            else
            {
                $request['password'] = $user['password'];
            }
            //avatar
            if($file = $request->file('file_avatar'))
            	$request['avatar'] = Upload::AddAvatar($file,$request['old_file_name']);
            
            //is_admin
	        if($request['is_admin']){
	        	$request['is_admin'] = 1;
	        }else
	        	$request['is_admin'] = 0;

            foreach($user->roles as $role)
            {
                $user->removeRole($role->name);
            }

            // Role/Permission
             if($request->permissions) {
                $user->syncPermissions($request->permissions);
            }
            
            $this->userRepo->update($request->toArray(), $id);
           $response = ['code' => 1, 'msg' => __('messages.update_success', ['name_object' => __('messages.user')])];
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.update_fail', ['name_object' => __('messages.user')])];
        }
        return redirect()->route('admin.user.index')->with('result', $response);
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
            $res = $this->userRepo->delete($id);
            if($res)
            {
                $response = ['code' => 1, 'msg' => __('messages.delete_success', ['name_object' => __('messages.user')])];
            }
            else
            {
                $response = ['code' => 0, 'msg' => __('messages.delete_fail', ['name_object' => __('messages.user')])];
            }
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.get_fail', ['name_object' => __('messages.user')])];
        }
        return response()->json($response);
    }

    
}
