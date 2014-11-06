<?php

class OrderController extends \BaseController {

	public function indexAction()
	{
		$query = Order::with([
			"user",
			"orderItems",
			"orderItems.product",
			"orderItems.product.category"
		]);

		$user = Input::get("account");

		if ($account) {
			$query->where("user_id", $user);
		}

		return $query->get();
	}

}