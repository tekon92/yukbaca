<?php

class Project extends \Eloquent {
	protected $fillable = ['project_name', 'author_name', 'book_cover', 'description', 'price'];

    protected $table = "projects";
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