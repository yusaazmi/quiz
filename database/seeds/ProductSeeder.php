<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = DB::table('categories')
            ->limit(1)
            ->get('id');
        $faker = Faker::create();
        for ($i = 1; $i < 10; $i++) {
            DB::table('products')->insert([
                'id' => Uuid::uuid4()->toString(),
                'product_name' => $faker->company(),
                'category_id' => factory(App\Category::class)->create()->id,
                'price' => $faker->numberBetween(1000, 5000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
