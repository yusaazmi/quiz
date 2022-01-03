<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i < 10; $i++) {
            $data = DB::table('categories')
                ->inRandomOrder()
                ->limit(1)
                ->first();
            DB::table('products')->insert([
                'id' => Uuid::uuid4()->toString(),
                'product_name' => $faker->company(),
                'category_id' => $data->id,
                'price' => $faker->numberBetween(1000, 5000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
