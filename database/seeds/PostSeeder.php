<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;	
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create('App\Post');
         DB::table('posts')->insert([
         	'title' => $faker->sentence(),
         	'body' => $faker->sentence(),
         	'categories' => $faker->sentence(),
         	'imageName' => $faker->sentence(),
         	'created_at' => \Carbon\Carbon::now()	

         ]);
    }
}
