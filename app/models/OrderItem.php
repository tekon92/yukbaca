<?php

class OrderItem extends \Eloquent {
    protected $table = "order_item";
    protected $guarded = ["id"];
    protected $softDelete = true;

    protected function Books()
    {
        return $this->belongsTo('Book', 'book_id');
    }
}