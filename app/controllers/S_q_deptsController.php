<?php

class S_q_deptsController extends BaseController {

	/**
	 * S_q_dept Repository
	 *
	 * @var S_q_dept
	 */
	protected $s_q_dept;

	public function __construct(S_q_dept $s_q_dept)
	{
		$this->s_q_dept = $s_q_dept;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$s_q_depts = $this->s_q_dept->all();

		return View::make('s_q_depts.index', compact('s_q_depts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('s_q_depts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, S_q_dept::$rules);
		if ($validation->passes())
		{
			$this->s_q_dept->create($input);

			return Redirect::route('s_q_depts.index');
		}

		return Redirect::route('s_q_depts.create')
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
		$s_q_dept = $this->s_q_dept->findOrFail($id);

		return View::make('s_q_depts.show', compact('s_q_dept'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$s_q_dept = $this->s_q_dept->find($id);

		if (is_null($s_q_dept))
		{
			return Redirect::route('s_q_depts.index');
		}

		return View::make('s_q_depts.edit', compact('s_q_dept'));
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
		$validation = Validator::make($input, S_q_dept::$rules);

		if ($validation->passes())
		{
			$s_q_dept = $this->s_q_dept->find($id);
			$s_q_dept->update($input);

			return Redirect::route('s_q_depts.show', $id);
		}

		return Redirect::route('s_q_depts.edit', $id)
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
		$this->s_q_dept->find($id)->delete();

		return Redirect::route('s_q_depts.index');
	}

}
