<?php

use Illuminate\Database\Seeder;

class SubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Sub::class, 4)->create()->each(function ($sub) {
            $sub->owner()->associate(App\User::random()->first());
            $sub->save();
        });
    }
}
