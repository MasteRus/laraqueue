<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GroupsController
 *
 * @author kasatkin
 */
class GroupsController extends Controller{
	protected $group;

	public function __construct(Group $group)
	{
		$this->group = $group;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$groups = $this->group->all();

		return View::make('groups.index', compact('groups'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('groups.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
                /*
		$validation = Validator::make($input, Group::$rules);
		if ($validation->passes())
		{
			$this->group->create($input);

			return Redirect::route('groups.index');
		}

		return Redirect::route('groups.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
                 * 
                 */
                //$this->group->create($input);
                $s_q_services=(S_q_service::all()->lists('id'));
                $result_array=array();
                $result_array["0"]=0;

                if (isset($input['permissions']))
                {
                    //add unchecked superuser permissions
                    if (!isset($result_array["superuser"])) 
                    $result_array["superuser"]=0;
                    
                    //add checked permissions
                    $perms=array_values($input['permissions']);
                    foreach ($perms as $perm){
                        $result_array[$perm] = 1;
                }
                    //add unchecked permissions
                    foreach ($s_q_services as $s_q_service){
                        $index=intval($s_q_service);
                        if (!isset($result_array[$index])) 
                            $result_array[$index]=0;
                }
                
                } else
                {
                    //No permissions - adding to array
                    $result_array["superuser"]=0;
                    
                foreach ($s_q_services as $s_q_service){
                    $index=intval($s_q_service);
                        $result_array[$index]=0; 
                }
                }
                
                ksort($result_array);
                $input['permissions']=json_encode($result_array);
                        
		$validation = Validator::make($input, Group::$rules);                
		if ($validation->passes())
		{
			$this->group->create($input);

			return Redirect::route('groups.index');
		}
                
                return Redirect::route('groups.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
                
                //$group = $this->group->find($id);
		//$group->update($input);
                //$this->group->create($input);

                //return Redirect::route('groups.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$group = $this->group->findOrFail($id);

		return View::make('groups.show', compact('group'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$group = $this->group->find($id);

		if (is_null($group))
		{
			return Redirect::route('groups.index');
		}

		return View::make('groups.edit', compact('group'));
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
                $s_q_services=(S_q_service::all()->lists('id'));
                $result_array=array();
                
                if (isset($input['permissions']))
                {
                    //add superuser permissions
                    if (!isset($result_array["superuser"])) 
                        $result_array["superuser"]=0;
                    else $result_array["superuser"]=1;
                    //add checked permissions
                    $perms=array_values($input['permissions']);
                    foreach ($perms as $perm){
                        $result_array[$perm] = 1;
                    }
                    //add unchecked permissions
                    foreach ($s_q_services as $s_q_service){
                        $index=intval($s_q_service);
                        if (!isset($result_array[$index])) 
                            $result_array[$index]=0;
                    }
                    
                } else
                {
                    //No permissions - adding to array
                    $result_array["superuser"]=0;
                    foreach ($s_q_services as $s_q_service){
                        $index=intval($s_q_service);
                        $result_array[$index]=0;
                    }
                }
                $result_array["0"]=0;
                ksort($result_array);
                $input['permissions']=json_encode($result_array);
                        
		$validation = Validator::make($input, Group::$rules);                
		if ($validation->passes())
		{
			$group = $this->group->find($id);
			$group->update($input);
			return Redirect::route('groups.show', $id);
		}

		return Redirect::route('groups.edit', $id)
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
		$this->group->find($id)->delete();

		return Redirect::route('groups.index');
	}
}
