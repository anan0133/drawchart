<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepository;
use App\Models\User;
use App\Models\Faq;
use App\Repositories\Contracts\ChartRepository;
use App\Repositories\Contracts\TypeRepository;
use App\Repositories\Contracts\FaqRepository;
use Excel;
use Validator;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;



class CustomerController extends Controller
{
    //
	protected $repository;
	protected $chartrepo;
	protected $typerepo;
	protected $faqsrepo;

    public function __construct(UserRepository $repository, ChartRepository $chartrepo, TypeRepository $typerepo, FaqRepository $faqsrepo)
    {
        $this->repository = $repository;
        $this->chartrepo = $chartrepo;
        $this->typerepo = $typerepo;
        $this->faqsrepo = $faqsrepo;
    }

    public function index()
    {
    	$collec =  $this->chartrepo->getListCollec();
    	$slide = $this->chartrepo->getListSlide();
        $type = $this->typerepo->getChildren();
        $list_parent = $this->typerepo->getParents();
        return view("home",compact('type','list_parent','collec','slide'));
    }

    //Route::post('/register','customer.register','CustomerController@register']);
    public function register(Request $request)
    {
        $validator = Validator::make($request->toArray(), [
            'name' => 'required|max:128',
            'email' => 'required|max:45|email|unique:users',
            'password' => 'required|max:20',
        ]);

        if ($validator->fails() == null) {
            $customer = $request->all();
            $customer["password"] = Hash::make($customer["password"]);
            $customer["is_admin"] = 0;

            $customer = $this->repository->create($customer);

            $customer = array_except($customer, ['password']);
            session(['customer' => $customer]);
            return response()->json(['success' => __('text.regis.success'),'data' => $customer]);
        }
        return response()->json(['errors' => $validator->errors()]);
    }

    //Route::post('/login','customer.login','CustomerController@login']);
    public function login(Request $request)
    {
        $validator = Validator::make($request->toArray(), [
            'login_email' => 'required|max:45|email|exists:users,email',
            'login_password' => 'required|max:30',
        ]);
        if ($validator->fails() == null){
            $request->all();
            $password = $request['login_password'];

            $customer = $this->repository->findWhere(['email' => $request->login_email])->first();

            if (Hash::check($password, $customer->password)) {

                $customer = array_except($customer, ['password']);
                
                session(['customer' => $customer]);
                return response()->json(['success' => __('text.login.success'),'data' => $customer]);
            }
            $arrayFail = array('login_password' =>__('text.pass.not_mactch'));
            return response()->json(['errors' => $arrayFail]);
        }
        return response()->json(['errors' => $validator->errors()]);
    }

    //Route::post('/logout','customer.logout','CustomerController@logout']);
    public function logout()
    {
        Session::flush();
        return redirect()->route('customer.index');
    }

    public function save(Request $request)
    {
        $upload_dir = "/file/chart/";
		$img = $request['hidden_data'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$file = $upload_dir . time() . ".png";
		$data = base64_decode($img);
        //dd($request);
       // $success = file_put_contents($file, $data);
		$success = Storage::disk()->put($file, $data);
		$chart = array('title' => $request['title_chart'],
					   'type_id'=> $request['type_chart'],
					   'thumbnail' => $file,
					   'user_id' => session('customer')->id);
		$this->chartrepo->create($chart);
		return $success ? $file : 'Unable to save the file.';
    }
    public function getform($id)
    {
    	$type = $this->typerepo->find($id);
    	$type_list = $this->typerepo->findByField('parent_id',$type->parent_id);
    	return view('user.templates.form.'.$type->parent->key, compact('type','type_list'));
    }
    public function importExcel(Request $request)
    {
        $validator = Validator::make($request->toArray(), [
            'import_file' => 'required|mimes:xls,xlsx,ods',
        ]);
        if ($validator->fails() == null){
        	if ($request->hasFile('import_file')) {
	            $path = $request->file('import_file')->path();
            	$data = Excel::load($path, function ($reader) {
            	})->get();
	            
	            if (!empty($data) && $data->count()) {
	                // Check format
	                // $data[0] and $data[1] formation is correct
					switch ($request->type_form) {
					    case 'single':
					        $x_data = array();
			            	$y_data = array();
			                // Sheet 01
			                foreach ($data[0] as $key => $value) {
			                	array_push($x_data, $value->x);
			                	array_push($y_data, $value->y);
			                }
			                if(!empty($x_data) && !empty($y_data)){
								return response()->json(['success' => __('text.import.success'),'x_data' => $x_data,'y_data' => $y_data]);
			            	}
					       break;
					    case 'mix':
					       	$x_data = array();
			            	$bar_data = array();
			            	$line_data = array();
			                // Sheet 01
			                foreach ($data[0] as $key => $value) {

			                	array_push($x_data, $value->x);
			                	array_push($bar_data, $value->bar_y);
			                	array_push($line_data, $value->line_y);
			                }
			                if(!empty($x_data) && !empty($bar_data)&& !empty($line_data)){
								return response()->json(['success' => __('text.import.success'),'x_data' => $x_data,'line_data' => $line_data,'bar_data' => $bar_data]);
			            	}
					        break;
					    default:
					        $x_data = array();
					        $y_data = array();
			            	$count_y = count($data[0][0]);
			                foreach ($data[0] as $key => $value) {
			                	array_push($x_data, $value->x);

			                	for ($i=1; $i<$count_y; $i++){
			                		$y = 'y'.$i;
			                		array_push($y_data, $value->$y);
			                	}
			                }
			                if(!empty($x_data) && !empty($y_data)){
								return response()->json(['success' => __('text.import.success'),'x_data' => $x_data,'y_data' => $y_data,'count_y' => $count_y]);
			            	}
					        break;
					};
	            	
				}
 			}
 			return response()->json(['errors' => __('text.file_not_data')]);
        }
 		return response()->json(['errors' => $validator->errors()]);
    }

    public function contact(Request $request)
    {
    	$validator = Validator::make($request->toArray(), [
            'name' => 'required|max:256',
            'email' => 'required|max:45|email',
            'content' => 'required',
        ]);
        if ($validator->fails() == null){
        	$faqs = $request->all();
        	$faqs['status'] = 0;
        	$faqs =  $this->faqsrepo->create($faqs);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }
        return response()->json(['success' =>  __('text.send.success')]);
    }

    public function mycollect()
    {
    	$customer = session('customer');
		$mycollect = $this->chartrepo->findByField('user_id',$customer->id);
		return view('user.templates.form.modal_mycollect',compact('mycollect'));
    }

    public function delmycollect($id)
    {
        $chart = $this->chartrepo->find($id);
        Storage::delete($chart->thumbnail);
        try 
        {
            $this->chartrepo->delete($id);
        } catch (\Exception $e) {
            return response()->json(['errors' => 'Errors!!!']);
        }
        // 1: success, 0: error -> fail
        return response()->json(['success' => __('messages.title_delete_success')]);

    }
}


