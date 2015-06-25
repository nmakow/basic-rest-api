<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('PostTableSeeder');

        Model::reguard();
    }
}

class PostTableSeeder extends Seeder
{
    public function run() 
    {
        DB::table('posts')->delete();

        Post::create([
            'author'    => 'Noah',
            'email'     => 'noah@email.com',
            'subject'   => 'This is great',
            'body'      => 'Hi everyone. Just testing out the API! This is wonderful!'
        ]);

        Post::create([
            'author'    => 'Anonymous',
            'email'     => 'anon@email.com',
            'subject'   => 'I\'m not sure I like this',
            'body'      => 'This is the body of my post. It\'s great, isn\'t it?'
        ]);

        Post::create([
            'author'    => 'NJFan',
            'email'     => 'nj@other.com',
            'subject'   => 'New Jersey',
            'body'      => 'New Jersey is a state in the United States of America.'
        ]);
    }
}
