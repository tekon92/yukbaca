<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BookTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
                        $categories = Category::all();
                        $users = User::all();


                    foreach ($categories as $category)
                        {
                                for ($i=0; $i < rand(-1, 10); $i++)
                                {
                                    Book::create([
                                        'title'     =>   $faker->word,
                                        'author' =>   $faker->randomElement($array = array ('tekon92','bertrand65','daisy36', 'merle21', 'igorczany', 'hschumm')),
                                        'description' => $faker->text($maxNbChars = 200),
                                        'book_cover' => $faker->imageUrl($width = 70, $height = 100),
                                        'price' => $faker->numberBetween($min = 50000, $max = 100000),
                                        'stock' => $faker->numberBetween($min = 0, $max = 100),
                                        'category_id' => $category->id,
                                        'author_id' => $faker->randomElement($array = array('1', '2', '3', '4', '5', '6'));
                                    ]);
                                }
                        }
	}

}