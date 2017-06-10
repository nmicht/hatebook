<?php

use Illuminate\Database\Seeder;

class PostCreator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Post::create([
        //     'content' => 'soy un puto post',
        //     'user_id' => 1
        // ])

        factory('App\Models\Post',5)->create();
    }
}
