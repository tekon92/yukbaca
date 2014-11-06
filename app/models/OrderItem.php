<?php

class OrderItem extends \Eloquent {
    protected $table = "order_item";
    protected $guarded = ["id"];
    protected $softDelete = true;

    protected function project()
    {
        return $this->belongsTo("Project");
    }

    public function order()
    {
        return $this->belongsTo("Order");
    }

    public function getTotalAttribute()
    {
        return $this->quantity * $this->price;
    }
}