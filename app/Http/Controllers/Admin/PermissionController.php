<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\PermissionRepository;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    //
    protected $permissionRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepo = $permissionRepo;
    }

    /**
     * [GET] 
     * @return [view] [description]
    */
    public function index()
    {
        $permissions = [];

        try
        {
            $permissions = $this->permissionRepo->all();
        }
        catch(\Exception $e)
        {
            Log::error($e);
        }

        return view('admin.pages.permission_list', compact('permissions'));
    }
}
