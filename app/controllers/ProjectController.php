<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /project
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all projects
		$projects = Project::all();

		// load the view and pass the projects
		return View::make('projects.index')
			->with('projects', $projects);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /project/create
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create view
		return View::make('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /project
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		$rules = array(
			'project_name' 	=> 'required',
			'author_name' 	=> 'required',
			'book_cover' 	=> 'required',
			'description' 	=> 'required',
			'price' 		=> 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if($validator->fails()) {
			return Redirect::to('projects/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$project = new Project;
			$project->project_name = Input::get('bookTitle');
			$project->author_name = Input::get('author');
			$project->book_cover = Input::get('bookCover');
			$project->description = Input::get('description');
			$project->price = Input::get('price');
			$project->save();

			// redirect
			Session::flash('message', 'Successfully created Book!');
			return Redirect::to('projects');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /project/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /project/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the product
		$project = Project::find($id);

		// show the view and pass the projects
		return View::make('projects.edit')
			->with('project', $project);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /project/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /project/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$project = Project::find($id);
		$project->delete();

		// redirect
		Session::flash('Messages', 'Successfully deleted the project');
		return Redirect::to('projects');
	}

}