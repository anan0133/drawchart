<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\TypeRepository;
use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Validator;
use Upload;
use Log;

class TypeController extends Controller
{
    protected $repository;
    public function __construct(TypeRepository $repository )
    {
        $this->repository = $repository;
    }

    public function index()
    {
    	$type_list = [];
        try
        {
            $type_list = $this->repository->all();
            
        }
        catch(\Exception $e)
        {
            Log::error($e);
        }
        return view('admin.pages.type_list',compact('type_list'));
        
    }
    public function create()    
    {
    	$type = null;
    	$list_parent = null;
    	try
        {
            $type = new Type;
            $list_parent = $this->repository->getParents();
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.error')];
            return redirect()->route('admin.type.index')->with('result', $response);
        }
       return view('admin.pages.type_model', compact('type', 'list_parent'));
    }

    /**
     * [POST] store object
     * @param  TagCreateRequest $request [description]
     * @return [type]                    [description]
     */
    public function store(TypeRequest $request)
    {
        /** Upload thumbnail */
        $file = $request->file('file_thumbnail');
        if($file)
        $thumbnail = Upload::Thumbnail($file, null);
         else return "loi";

    	try
        {
        	$request['thumbnail'] = $thumbnail;

            $type = $this->repository->create($request->toArray());
            $response = ['code' => 1, 'msg' => __('messages.create_success', ['name_object' => __('messages.type')])];

        }
        catch(\Exception $e)
        {
            \Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.create_fail', ['name_object' => __('messages.type')])];
        }
        return redirect()->route('admin.type.index')->with('result', $response);
    }

     /**
     * [GET] get object by id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        
        $type = null;
       
        try
        {
            $type = $this->repository->find($id);
            $list_parent = $this->repository->getParents();
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.error')];
        }

        if(!$type)
        {
            if(!isset($response))
                $response = ['code' => 0, 'msg' => __('messages.get_fail', ['name_object' => __('messages.type')])];
            
            return redirect()->route('admin.type.index')->with('result', $response);
        }

       return view('admin.pages.type_model', compact('type', 'list_parent'));
    }

    public function update(TypeRequest $request, $id)
    {
        /** Upload thumbnail */
        $file = $request->file('file_thumbnail');
        $thumbnail = Upload::Thumbnail($file, $request['old_file_name']);

    	try
        {
        	$request['thumbnail'] = $thumbnail;

            $type = $this->repository->update($request->toArray(), $id);
            $response = ['code' => 1, 'msg' => __('messages.update_success', ['name_object' => __('messages.type')])];

        }
        catch(\Exception $e)
        {
            \Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.update_fail', ['name_object' => __('messages.type')])];
        }
        return redirect()->route('admin.type.index')->with('result', $response);
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
                $response = ['code' => 1, 'msg' => __('messages.delete_success', ['name_object' => __('messages.type')])];
            }
            else
            {
                $response = ['code' => 0, 'msg' => __('messages.delete_fail', ['name_object' => __('messages.type')])];
            }
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.get_fail', ['name_object' => __('messages.type')])];
        }
        return response()->json($response);
    }
}
