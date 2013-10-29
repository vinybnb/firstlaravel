<?php

class DogsController extends BaseController {

	/**
	 * Dog Repository
	 *
	 * @var Dog
	 */
	protected $dog;

	public function __construct(Dog $dog)
	{
		$this->dog = $dog;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$dogs = $this->dog->all();

		return View::make('dogs.index', compact('dogs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('dogs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Dog::$rules);

		if ($validation->passes())
		{
			$this->dog->create($input);

			return Redirect::route('dogs.index');
		}

		return Redirect::route('dogs.create')
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
		$dog = $this->dog->findOrFail($id);

		return View::make('dogs.show', compact('dog'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$dog = $this->dog->find($id);

		if (is_null($dog))
		{
			return Redirect::route('dogs.index');
		}

		return View::make('dogs.edit', compact('dog'));
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
		$validation = Validator::make($input, Dog::$rules);

		if ($validation->passes())
		{
			$dog = $this->dog->find($id);
			$dog->update($input);

			return Redirect::route('dogs.show', $id);
		}

		return Redirect::route('dogs.edit', $id)
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
		$this->dog->find($id)->delete();

		return Redirect::route('dogs.index');
	}

}
