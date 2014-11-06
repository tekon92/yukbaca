<?php

class IndexController extends \BaseController {

	public function indexAction()
	{
		$query = Project::with(["category"]);
		$category = Input::get("category");

		if($category)
		{
			$query->where("category_id", $category);
		}

		// return $query->get();
		return View::make("index");
	}

}