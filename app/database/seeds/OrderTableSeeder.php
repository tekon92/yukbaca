<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrderTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

                        $users = User::all();

		foreach($users as $user)
		{
		  for ($i = 0; $i < rand(-1,5 ); $i++)
                          {
                              Order::create([
                                "user_id" => $user->id
                             ]);
                          }
		}
	}

}