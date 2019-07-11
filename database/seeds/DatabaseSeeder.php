<?php

use Illuminate\Database\Seeder;
use Faker\Factory as fk;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $species = ['amfibijos', 'kablokas', 'grybai', 'arkliniai', 'darzoviniai', 'kombaininiai'];
        
        $faker = fk::create('en_EN');
        
        foreach(range(0,15) as $val)
        {
            DB::table('owners')->insert([
                'first_name'=>$faker->firstName(),
                'last_name'=>$faker->lastName(),
                'category'=> $species[rand(0,5)]
            ]);
        }

        foreach(range(0,15) as $val)
        {
            DB::table('providers')->insert([
                'owner_id'=>rand(1, 16),
                'title'=>$faker->company(),
                'description'=> $faker->realText(203)
            ]);
        }
    }
}
