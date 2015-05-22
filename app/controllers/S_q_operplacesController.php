<?php

class S_q_operplacesController extends BaseController {

	/**
	 * S_q_operplace Repository
	 *
	 * @var S_q_operplace
	 */
	protected $s_q_operplace;

	public function __construct(S_q_operplace $s_q_operplace)
	{
		$this->s_q_operplace = $s_q_operplace;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$s_q_operplaces = $this->s_q_operplace->all();

		return View::make('s_q_operplaces.index', compact('s_q_operplaces'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('s_q_operplaces.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, S_q_operplace::$rules);

		if ($validation->passes())
		{
			$this->s_q_operplace->create($input);

			return Redirect::route('s_q_operplaces.index');
		}

		return Redirect::route('s_q_operplaces.create')
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
		$s_q_operplace = $this->s_q_operplace->findOrFail($id);

		return View::make('s_q_operplaces.show', compact('s_q_operplace'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$s_q_operplace = $this->s_q_operplace->find($id);

		if (is_null($s_q_operplace))
		{
			return Redirect::route('s_q_operplaces.index');
		}

		return View::make('s_q_operplaces.edit', compact('s_q_operplace'));
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
		$validation = Validator::make($input, S_q_operplace::$rules);

		if ($validation->passes())
		{
			$s_q_operplace = $this->s_q_operplace->find($id);
			$s_q_operplace->update($input);

			return Redirect::route('s_q_operplaces.show', $id);
		}

		return Redirect::route('s_q_operplaces.edit', $id)
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
		$this->s_q_operplace->find($id)->delete();

		return Redirect::route('s_q_operplaces.index');
	}

}
