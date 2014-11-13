<?php

class AuthorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /author
	 *
	 * @return Response
	 */
	public function index()
	{
		// load the authoe
		$authors = User::all();
		$books = Book::orderBy('created_at', 'DESC')->take(5)->get();

		// load the author and pass the view
		Return View::make('authors.index')
			->with('authors', $authors)
			->with('books', $books);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /author/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /author
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /author/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// find the author
		$authors = User::find($id);

		Return View::make('authors.view')
			->with('authors', $authors);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /author/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /author/{id}
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
	 * DELETE /author/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}