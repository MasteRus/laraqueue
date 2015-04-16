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

		return View::make('s_q_services.index', compact('s_q_services'));
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

}
