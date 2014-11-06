<?php

class Category extends \Eloquent {
	// protected $fillable = [];

    protected $table = "category";
    protected $guarded = ["id"];
    protected $softDelete = true;

    public function projects()
    {
        return $this->hasMany("Project");
    }
}