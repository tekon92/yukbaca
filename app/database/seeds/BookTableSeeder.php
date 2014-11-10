<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BookTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
                        $categories = Category::all();

		foreach($categories as $category)
		{
			for ($i=0; $i < rand(-1, 10); $i++) {
                                    Book::create([
                                        'title'     =>   $faker->word,
                                        'author' =>   $faker->,
                                        'description' =>,
                                        'book_cover' =>,
                                        'stock' =>,
                                        ''
                                    ]);
                                    }
		}
	}

}