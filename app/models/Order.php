<?php

class Order extends \Eloquent {
	// protected $fillable = [];

    protected $table = "order";
    protected $fillable = array('user_id');
    protected $guarded = ["id"];
    protected $softdelete = true;

    public function user()
    {
        return $this->belongsTo("User");
    }

    public function orderItems()
    {
        return $this->belongsToMany('Book', 'order_book');->withPivot('amount', 'price', 'total');
    }

   public function User()
   {
    return $this->belongsTo('User', 'user_id');
   }
}