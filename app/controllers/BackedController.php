<?php

class BackedController extends \BaseController {

	public function show($id)
	{
		$project = Project::find($id);

		// load the view

		return View::make('backed.show')
			->with('project', $project);
	}

}