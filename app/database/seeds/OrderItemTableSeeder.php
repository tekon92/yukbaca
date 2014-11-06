<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrderItemTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
                        $orders = Order::all();
                        $projects = Project::all()->toArray();

        foreach($orders as $order)
        {
                            $used = [];

                            for ($i = 0; $i < rand(1, 5); $i++)
                            {
                               $project = $faker->randomElement($projects);

                               if (!in_array($project["id"], $used))
                               {
                                    $id = $project["id"];
                                    $price = $project["price"];
                                    $quantity = $faker->numberBetween(1, 3);

                                    OrderItem::create([
                                        "order_id" => $order->id,
                                        "project_id" => $id,
                                        "price" => $price,
                                        "quantity" => $quantity
                                    ]);
                               }
                            }
        }
	}

}