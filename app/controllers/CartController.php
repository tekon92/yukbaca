<?php

class CartController extends \BaseController {

	public function postAddToCart()
	{
		$rules = array(
			'amount' => 'required',
			'book' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('book.index')
				->with('error', 'The Book Could not added to your cart');
		}

		$user_id = Auth::user()->id;
		$book_id = input::get('book');
		$amount = input::get('amount');

		$book = Book::find($book_id);
		$total = $amount*$book->price;

		$count = Cart::where('book_id', '=', $book_id)->where('user_id', '=', $user_id)->count();

		if ($count) {
			return Redirect::to('books.index')
				->with('error', 'The book already in your cart');
		}

		Cart::create(array(
			'user_id' => $user_id,
			'book_id' => $book_id,
			'amount' => $amount,
			'total' => $total
		));
		return Redirect::route('cart');
	}

	public function getIndex()
	{
		$user_id = Auth::user()->id;
		$cart_books = Cart::with('Books')->where('user_id', '=', $user_id)->get();
		$cart_total = Cart::with('Books')->where('user_id', '=', $user_id)->sum('total');

		if (!count($cart_books)) {
			return Redirect::to('books.index')
				->with('error', 'your cart is empty');
		}

		return View::make('cart.index')
			->with('cart_books', $cart_books)
			->with('cart_total', $cart_total);
	}

	public function getDelete($id)
	{
		$cart = Cart::find($id)->delete();
		return Redirect::route('cart');
	}

}