<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{

			User::create([
                                        "username" => $faker->username,
                                        "email" => $faker->email,
                                        "password" => 'password',
                                        "password_confirmation" => 'password',
                                        "confirmation_code" => md5(uniqid(mt_rand(), true)),
                                        "remember_token" => null,
                                        "confirmed" => 0
			]);
		}
	}

}