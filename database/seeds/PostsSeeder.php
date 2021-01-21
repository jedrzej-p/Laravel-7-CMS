<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'Post pierwszy',
                'content' => 'Zawartość postu',
                'date' => '2021-01-01',
                'author_id' => '1',
                'group_id' => '1',
            ],
            [
                'title' => 'Post drugi',
                'content' => 'Zawartość postu',
                'date' => '2021-01-01',
                'author_id' => '1',
                'group_id' => '2',
            ],
            [
                'title' => 'Post trzeci',
                'content' => 'Zawartość postu',
                'date' => '2021-01-01',
                'author_id' => '1',
                'group_id' => '3',
            ]
        ]);
    }
}
