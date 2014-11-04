<?php

class Project extends \Eloquent {
	protected $fillable = ['project_name', 'author_name', 'book_cover', 'description', 'price'];
}