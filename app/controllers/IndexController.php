<?php

class IndexController extends \BaseController {

	public function index()
	{
		$projects = Project::paginate(5);
		$books = Book::paginate(5);
		$bookSort = Book::orderBy('created_at', 'DESC')->take(5)->get();
		$category = Category::all();
		// $latest = Project::all()->orderBy('created_at')->get();

		return View::make("index")
			->with('project', $projects)
			->with('category', $category)
			->with('books', $books)
			->with('bookSort', $bookSort);
			// ->with('latest', $latest);
	}

	public function show($id)
	{
		$project = Project::find($id);

		return View::make("show")
			->with('project', $project);
	}

}