<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        DB::table('posts')->insert([
          [
            'user_id' => 1,
            'title' => 'Example 1 post',
            'body' => 'post 1',
            'published_at' => date('Y-m-d H:i:s', strtotime('now'))
          ],
          [
            'user_id' => 1,
            'title' => 'Example 2 post',
            'body' => 'post 2',
            'published_at' => date('Y-m-d H:i:s', strtotime('+2 weeks'))
          ],
          [
            'user_id' => 1,
            'title' => 'Example 3 post',
            'body' => 'post 3',
            'published_at' => null
          ],
        ]);
    }
}
