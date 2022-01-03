<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=1;$i<10;$i++){
            $data = DB::table('products')
                    ->inRandomOrder()
                    ->limit(1)
                    ->first();
            DB::table('product_details')
                ->insert([
                    'id' => Uuid::uuid4()->toString(),
                    'product_id' => $data->id,
                    'description' => $faker->paragraph(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
        }
    }
}
