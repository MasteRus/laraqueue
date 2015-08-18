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
            $current_Date=new DateTime;
            $queryresult=DB::insert('insert into terminal_log (service_id,created_at) values (?,?)',array((int)($input['service_id']),$current_Date));
            
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
                    /*
                        $table->increments('id');
                        $table->dateTime('datetime');
                        $table->integer('number');
                        $table->string('prefix');
                        $table->string('status');//Created, InQueue%NUMB%, InService, Finished, Retranslated, Cancelled
                        
                        $table->integer('s_q_operplaces_id')->unsigned()->nullable();
                        $table->integer('user_id')->unsigned()->nullable();
                     */
            //return View::make('terminal/index', compact('s_q_services'),compact('parent'),compact('all_services'));
            
            $maximal_number_in_queue_today=DB::select('SELECT count(*) as MaxNumber '
                    . 'FROM MainQueue '
                    . 'WHERE datetime >= DATE( NOW( ) ) '
                    );
            
            //if (!$maximal_number_in_queue_today) $maximal_number_in_queue_today=1;
            
            $NewMainQueueTicket=New MainQueue;
            $NewMainQueueTicket->service_id=(int)($input['service_id']);
            $NewMainQueueTicket->status='created';
            $NewMainQueueTicket->datetime=$current_Date;
            $NewMainQueueTicket->number=((int)($maximal_number_in_queue_today[0]->MaxNumber)+1);
            $NewMainQueueTicket->save();

            return Redirect::route('getterminalindex', compact('s_q_services'))
                    ->with('parent',$parent)
                    ->with('all_services',$all_services)
                    ->with(
                            'message',  
                            (int)($maximal_number_in_queue_today[0]->MaxNumber)+1
                          )
            //return View::make('terminal/index',compact('s_q_services'))
            //        ->with('parent',$parent)
            //        ->with('all_services',$all_services)
            //        ->with('message',$queryresult)
                ;

            

        }


}
