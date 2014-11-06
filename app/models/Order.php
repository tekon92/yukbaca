<?php

class Order extends \Eloquent {
	// protected $fillable = [];

    protected $table = "order";
    protected $guarded = ["id"];
    protected $softdelete = true;

    public function user()
    {
        return $this->belongsTo("User");
    }

    public function orderItems()
    {
        return $this->hasMany("OrderItem");
    }

    public function projects()
    {
        return $this->belongsToMany("Projects", "order_item");
    }

    public function getTotalAttribute()
    {
        $total = 0;

        foreach ($$this->orderItems as $orderItem) {
            $total += $orderItem->price * $orderItem->quantity;
        }

        return $total;
    }
}