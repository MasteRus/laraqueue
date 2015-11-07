<?php

class S_q_orgsController extends BaseController {

	/**
	 * S_q_org Repository
	 *
	 * @var S_q_org
	 */
	protected $s_q_org;

	public function __construct(S_q_org $s_q_org)
	{
		$this->s_q_org = $s_q_org;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$s_q_orgs = $this->s_q_org->all();

		return View::make('s_q_orgs.index', compact('s_q_orgs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('s_q_orgs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, S_q_org::$rules);

		if ($validation->passes())
		{
			$this->s_q_org->create($input);

			return Redirect::route('s_q_orgs.index');
		}

		return Redirect::route('s_q_orgs.create')
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
		$s_q_org = $this->s_q_org->findOrFail($id);

		return View::make('s_q_orgs.show', compact('s_q_org'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$s_q_org = $this->s_q_org->find($id);

		if (is_null($s_q_org))
		{
			return Redirect::route('s_q_orgs.index');
		}

		return View::make('s_q_orgs.edit', compact('s_q_org'));
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
		$validation = Validator::make($input, S_q_org::$rules);

		if ($validation->passes())
		{
			$s_q_org = $this->s_q_org->find($id);
			$s_q_org->update($input);

			return Redirect::route('s_q_orgs.show', $id);
		}

		return Redirect::route('s_q_orgs.edit', $id)
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
		$this->s_q_org->find($id)->delete();

		return Redirect::route('s_q_orgs.index');
	}

        public function test()
        {
        //return link_to(route('auth.logout'), 'Выход');
            $s_q_orgs = $this->s_q_org->all();
            return View::make('test', compact('s_q_orgs'));
        }
        
        public function ajaxform()
        {
        //return link_to(route('auth.logout'), 'Выход');
            $s_q_orgs = $this->s_q_org->all();
            return View::make('ajaxform', compact('s_q_orgs'));
        }
        
}
