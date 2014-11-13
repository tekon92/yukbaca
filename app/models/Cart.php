<?php

class Cart extends \Eloquent {
	protected $fillable = ['user_id', 'book_id', 'amount', 'total'];

    public function Books()
    {
        return $this->belongsTo('Book', 'book_id');
    }
}