<?php

class Book extends \Eloquent {
	protected $fillable = ['title', 'author', 'description', 'book_cover', 'stock', 'price', 'category_id'];

    protected $guarded = ['id'];
    protected $softDelete = true;

    public function orders()
    {
        return $this->belongsToMany('Order', 'order_item');
    }

    public function orderItems()
    {
        return $this->hasMany('OrderItem');
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }
}