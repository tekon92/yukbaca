<?php

class IndexController extends \BaseController {

	public function index()
	{
		$projects = Project::paginate(10);
		$category = Category::all();
		// $latest = Project::all()->orderBy('created_at')->get();

		return View::make("index")
			->with('project', $projects)
			->with('category', $category);
			// ->with('latest', $latest);
	}

	public function show($id)
	{
		$project = Project::find($id);

		return View::make("show")
			->with('project', $project);
	}

}