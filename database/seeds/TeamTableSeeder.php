<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Team::class,2)->create()->each(function($q){
            for($i=0; $i<11; $i++){
                $q->players()->save(factory(\App\Player::class)->make());
            }
        });
    }
}
