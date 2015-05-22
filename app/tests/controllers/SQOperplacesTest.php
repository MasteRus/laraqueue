<?php

use Mockery as m;
use Way\Tests\Factory;

class SQOperplacesTest extends TestCase {

	public function __construct()
	{
		$this->mock = m::mock('Eloquent', 'S_q_operplace');
		$this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	}

	public function setUp()
	{
		parent::setUp();

		$this->attributes = Factory::s_q_operplace(['id' => 1]);
		$this->app->instance('S_q_operplace', $this->mock);
	}

	public function tearDown()
	{
		m::close();
	}

	public function testIndex()
	{
		$this->mock->shouldReceive('all')->once()->andReturn($this->collection);
		$this->call('GET', 's_q_operplaces');

		$this->assertViewHas('s_q_operplaces');
	}

	public function testCreate()
	{
		$this->call('GET', 's_q_operplaces/create');

		$this->assertResponseOk();
	}

	public function testStore()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(true);
		$this->call('POST', 's_q_operplaces');

		$this->assertRedirectedToRoute('s_q_operplaces.index');
	}

	public function testStoreFails()
	{
		$this->mock->shouldReceive('create')->once();
		$this->validate(false);
		$this->call('POST', 's_q_operplaces');

		$this->assertRedirectedToRoute('s_q_operplaces.create');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testShow()
	{
		$this->mock->shouldReceive('findOrFail')
				   ->with(1)
				   ->once()
				   ->andReturn($this->attributes);

		$this->call('GET', 's_q_operplaces/1');

		$this->assertViewHas('s_q_operplace');
	}

	public function testEdit()
	{
		$this->collection->id = 1;
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->once()
				   ->andReturn($this->collection);

		$this->call('GET', 's_q_operplaces/1/edit');

		$this->assertViewHas('s_q_operplace');
	}

	public function testUpdate()
	{
		$this->mock->shouldReceive('find')
				   ->with(1)
				   ->andReturn(m::mock(['update' => true]));

		$this->validate(true);
		$this->call('PATCH', 's_q_operplaces/1');

		$this->assertRedirectedTo('s_q_operplaces/1');
	}

	public function testUpdateFails()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
		$this->validate(false);
		$this->call('PATCH', 's_q_operplaces/1');

		$this->assertRedirectedTo('s_q_operplaces/1/edit');
		$this->assertSessionHasErrors();
		$this->assertSessionHas('message');
	}

	public function testDestroy()
	{
		$this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

		$this->call('DELETE', 's_q_operplaces/1');
	}

	protected function validate($bool)
	{
		Validator::shouldReceive('make')
				->once()
				->andReturn(m::mock(['passes' => $bool]));
	}
}
