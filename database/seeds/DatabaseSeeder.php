<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        // $this->call(PostSeeder::class);
        // $this->call(CommentSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(RegionSeeder::class);
        // $this->call(ProfileSeeder::class);
        $this->call(InterestSeeder::class);
    }
}
