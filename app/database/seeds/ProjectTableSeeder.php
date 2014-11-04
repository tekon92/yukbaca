<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProjectTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Project::create([
                                        'project_name' => $faker->word,
                                        'author_name' => $faker->firstName($gender = null | 'male' | 'female'),
                                        'book_cover' => $faker->imageUrl($width = 70, $height = 100),
                                        'description' => $faker->text($maxNbChars = 200),
                                        'price' => $faker->numberBetween($min = 50000, $max = 100000)
            ]);
		}
	}

}