<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProjectTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
                        $categories = Category::all();

		foreach($categories as $category)
		{
		  for ($i = 0; $i < rand(-1, 10); $i++)
                          {
                            Project::create([
                                        'project_name' => $faker->word,
                                        'author_name' => $faker->firstName($gender = null | 'male' | 'female'),
                                        'book_cover' => $faker->imageUrl($width = 70, $height = 100),
                                        'description' => $faker->text($maxNbChars = 200),
                                        'price' => $faker->numberBetween($min = 50000, $max = 100000),
                                        'stock' => $faker->numberBetween($min = 0, $max = 100),
                                        'category_id' => $category->id
                             ]);
                          }
		}
	}

}