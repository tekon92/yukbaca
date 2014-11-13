<?php

class OrderController extends \BaseController {

	public function postOrder()
	{
		$rules = array('address'=>'required');

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('cart')->with('error', 'Address field is required');
		}

		$user_id = Auth::user()->id;
		$address = Input::get('address');

		$cart_books = Cart::with('Books')->where('user_id', '=', $user_id)->get();
		$cart_total = Cart::with('Books')->where('user_id', '=', $user_id)->sum('total');

		if (!$cart_books) {
			return Redirect::route('index')->with('error', 'your cart is empty');
		}

		$order = Order::create(array(
			'user_id' => $user_id,
			'address' => $address,
			'total' => $cart_total
		));

		foreach ($cart_books as $order_books) {
			$order->orderItems()->attach($order_books->book_id, array(
				'amount'=>$order_books->amount,
				'price' => $order_books->Books->price,
				'total' => $order_books->Books->price*$order_books->amount
				));
		}

		Cart::where('member_id', '=', $member_id)-delete();
		return Redirect::route('index')->with('message', 'Your order processed successfully');
	}

	public function getIndex()
	{
		$user_id = Auth::user()->id;

		if (Auth::user()->admin) {
			$orders->Order::all();
		} else {
			$orders = Order::with('orderItems')->where('user_id', '=', $user_id)->get();
		}

		if (!$orders) {
			return Redirect::route('books.index')
				->with('error', 'There is no order');
		}

		return View::make('order')
			->with('orders', $orders);

	}

}