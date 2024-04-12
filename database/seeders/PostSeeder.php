<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory(20)->create();
        DB::table('posts')->insert([
            'user_id' => User::all()->random()->id,
            'title' => Str::random(10),
            'content' => Str::random(10),
            'description' => Str::random(10)
        ]);
    }
}
