<?php

class BookController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /book
	 *
	 * @return Response
	 */
	public function index()
	{
		// load the book
		$books = Book::all();
		$category = Category::all();

		// load the view and pass the book
		Return View::make('books.index')
			->with('books', $books)
			->with('category', $category);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /book/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /book
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /book/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// load the books
		$books = Book::find($id);

		// pass to the view
		return View::make('books.view')
			->with('books', $books);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /book/{id}/edit
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
	 * PUT /book/{id}
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
	 * DELETE /book/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}