<?php

class S_q_servicesController extends BaseController {

	/**
	 * S_q_service Repository
	 *
	 * @var S_q_service
	 */
	protected $s_q_service;

	public function __construct(S_q_service $s_q_service)
	{
		$this->s_q_service = $s_q_service;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$s_q_services = $this->s_q_service->all();
                
                $servnames=array();
                $servnames[0]="";
                    foreach ($s_q_services as $s_q_serv) {
                        $servnames[$s_q_serv->id]=$s_q_serv->name;
                    }

		return View::make('s_q_services.index', compact('s_q_services'),compact('servnames'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('s_q_services.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, S_q_service::$rules);

		if ($validation->passes())
		{
			$this->s_q_service->create($input);

			return Redirect::route('s_q_services.index');
		}

		return Redirect::route('s_q_services.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$s_q_service = $this->s_q_service->findOrFail($id);

		return View::make('s_q_services.show', compact('s_q_service'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$s_q_service = $this->s_q_service->find($id);

		if (is_null($s_q_service))
		{
			return Redirect::route('s_q_services.index');
		}

		return View::make('s_q_services.edit', compact('s_q_service'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, S_q_service::$rules);

		if ($validation->passes())
		{
			$s_q_service = $this->s_q_service->find($id);
			$s_q_service->update($input);

			return Redirect::route('s_q_services.show', $id);
		}

		return Redirect::route('s_q_services.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->s_q_service->find($id)->delete();

		return Redirect::route('s_q_services.index');
	}

        
        
	public function treeindex($ParentID=0)
	{
                $s_q_services = $this->s_q_service->all();
                foreach ($s_q_services as $serv)
                {
                    $array[(int)$serv->id]=array(
                        'id' => $serv->id,
                        'name' => $serv->name,
                        'parent_id' => $serv->parent_id,
                            );
                }
                //$tree=Helpers::buildTree($array);
                return View::make('s_q_services/treeindex', compact('s_q_services'));
	}
        
        public function getterminalindex($parent_id=0)
        {

            $s_q_services = S_q_service::where('parent_id', $parent_id)->get();
            $all_services=array();
            //$all_services=$s_q_services;

            foreach ($s_q_services as $serv)
            {
                $choosed_services=S_q_service::where('parent_id', $serv->id)->count();
                //$choosed_services[$i++]=$serv->name;
                $all_services[$serv->id]=$choosed_services;
                //array_push($all_services, $choosed_services);
            }
            $parent=array('parent_id'=>$parent_id,'text' => 'getterminalindex');
            
            //return View::make('terminal/index', compact('s_q_services'),compact('parent'),compact('all_services'));
            return View::make('terminal/index',compact('s_q_services'))
                    ->with('parent',$parent)
                    ->with('all_services',$all_services)
                ;
        }
        
        public function postterminalindex($parent_id)
        {
            $input = array_except(Input::all(), '_method');
            
            /*
            $validation = Validator::make($input, S_q_service::$rules);
            

            if ($validation->passes())
            {
                    $s_q_service = $this->s_q_service->find($id);
                    $s_q_service->update($input);

                    return Redirect::route('s_q_services.show', $id);
            }
            */
            //dd($input );
            $queryresult=DB::insert('insert into terminal_log (service_id,created_at) values (?,?)',array((int)($input['service_id']),new DateTime));
            //dd($queryresult);
            /*
            DB::insert('insert into actionslog (service_id) values (?)',
                    array($input['service_id']) );
             * 
             
            $serviceid=$input['service_id'];
             * 
             */
            //return View::make('terminal/index', compact('queryresult'),compact('input'),compact('service_printed'),compact('serviceid'));
            /*
            return Redirect::refresh()
                    ->withInput()
                    //->withErrors($validation)
                    //->with('message', 'There were validation errors.')
                    ;
            */
            $s_q_services = S_q_service::where('parent_id', (int)($input['service_id']))->get();
            $all_services=array();
            //$all_services=$s_q_services;

            foreach ($s_q_services as $serv)
            {
                $choosed_services=S_q_service::where('parent_id', $serv->id)->count();
                //$choosed_services[$i++]=$serv->name;
                $all_services[$serv->id]=$choosed_services;
                //array_push($all_services, $choosed_services);
            }
            $parent=array('parent_id'=>(int)($input['service_id']),'text' => 'getterminalindex');
            
            //return View::make('terminal/index', compact('s_q_services'),compact('parent'),compact('all_services'));
            return View::make('terminal/index',compact('s_q_services'))
                    ->with('parent',$parent)
                    ->with('all_services',$all_services)
                    ->with('message',$queryresult)
                ;

            

        }


}
