<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->truncate();
        DB::table('pages')->insert([
            [
                'title' => 'about',
                'category_id' => 1,
                'slug' => '1',
                'content' => 'test'
            ],
            [
              'title' => 'about',
              'category_id' => 1,
              'slug' => '2',
              'content' => 'test'
            ]
        ]
        );
    }
}
