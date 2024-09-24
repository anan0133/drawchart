<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ChartRepository;
use App\Repositories\Contracts\TypeRepository;
use App\Models\Chart;
use App\Http\Requests\ChartRequest;
use Validator;
use Log;
use Auth;
use Upload;


class ChartController extends Controller
{

	protected $chartRepo, $typeRepo;
    public function __construct(ChartRepository $chartRepo, TypeRepository $typeRepo )
    {
        $this->chartRepo = $chartRepo;
        $this->typeRepo = $typeRepo;
    }

    /**
     * [index description]
     * @return [type] [description]
     */
	public function index()
    {
    	$chart_list = [];
        try
        {
            $chart_list = $this->chartRepo->all();
            
        }
        catch(\Exception $e)
        {
            Log::error($e);
        }
        return view('admin.pages.chart_list',compact('chart_list'));
        
    }

    public function create()    
    {
    	$chart = null;
    	$type_list = null;
    	try
        {
            $chart = new Chart;
            $type_list = $this->typeRepo->getChildren();
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.error')];
            return redirect()->route('admin.chart.index')->with('result', $response);
        }
       return view('admin.pages.chart_model', compact('chart', 'type_list'));
    }

    public function store(ChartRequest $request)    
    {
    	/** Upload thumbnail */
        $file = $request->file('file_thumbnail');
        $thumbnail = Upload::Thumbnail($file, null);

    	try
        {
        	$request['thumbnail'] = $thumbnail;
            
        	if($request['display_slide'])
        		$request['display_slide'] = 1;

        	if($request['display_collect'])
        		$request['display_collect'] = 1;

        	$request['user_id'] = Auth::guard('admin')->user()->id;

            $chart = $this->chartRepo->create($request->toArray());
            $response = ['code' => 1, 'msg' => __('messages.create_success', ['name_object' => __('messages.chart')])];

        }
        catch(\Exception $e)
        {
            \Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.create_fail', ['name_object' => __('messages.chart')])];
        }
        return redirect()->route('admin.chart.index')->with('result', $response);
    }

     /**
     * [GET] get object by id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        
       $chart = null;
       $type_list = null;
        try
        {
            $chart = $this->chartRepo->find($id);
            $type_list = $this->typeRepo->getChildren();
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.error')];
        }

        if(!$chart)
        {
            if(!isset($response))
                $response = ['code' => 0, 'msg' => __('messages.get_fail', ['name_object' => __('messages.chart')])];
            
            return redirect()->route('admin.chart.index')->with('result', $response);
        }

       return view('admin.pages.chart_model', compact('chart', 'type_list'));
    }

    public function update(ChartRequest $request, $id)
    {
       /** Upload thumbnail */
        $file = $request->file('file_thumbnail');
        $thumbnail = Upload::Thumbnail($file, $request['old_file_name']);

        try
        {
            $request['thumbnail'] = $thumbnail;
            
            if($request['display_slide'])
                $request['display_slide'] = 1;

            if($request['display_collect'])
                $request['display_collect'] = 1;

            $request['user_id'] = Auth::guard('admin')->user()->id;

            $chart = $this->chartRepo->update($request->toArray(),$id);
            $response = ['code' => 1, 'msg' => __('messages.create_success', ['name_object' => __('messages.chart')])];

        }
        catch(\Exception $e)
        {
            \Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.create_fail', ['name_object' => __('messages.chart')])];
        }
        return redirect()->route('admin.chart.index')->with('result', $response);
    }

    /**
     * [collect description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function collect( $id)
    {
    	try 
    	{
    		$chart = $this->chartRepo->find($id);
    		$chart['display_collect'] = !$chart['display_collect'];

    		$chart = $this->chartRepo->update($chart->toArray(), $id);

    		$response = ['code' => 1, 'msg' => __('messages.update_success', ['name_object' => __('messages.chart')])];
    	} catch (Exception $e) {
    		Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.error')];
    	}
    	return response()->json($response);
    } 

    public function slide( $id)
    {
    	try 
    	{
    		$chart = $this->chartRepo->find($id);
    		$chart['display_slide'] = !$chart['display_slide'];

    		$chart = $this->chartRepo->update($chart->toArray(), $id);

    		$response = ['code' => 1, 'msg' => __('messages.update_success', ['name_object' => __('messages.chart')])];
    	} catch (Exception $e) {
    		Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.error')];
    	}
    	return response()->json($response);
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
            $res = $this->chartRepo->delete($id);
            if($res)
            {
                $response = ['code' => 1, 'msg' => __('messages.delete_success', ['name_object' => __('messages.chart')])];
            }
            else
            {
                $response = ['code' => 0, 'msg' => __('messages.delete_fail', ['name_object' => __('messages.chart')])];
            }
        }
        catch(\Exception $e)
        {
            Log::error($e);
            $response = ['code' => 0, 'msg' => __('messages.get_fail', ['name_object' => __('messages.chart')])];
        }
        return response()->json($response);
    }
}
