<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Photo;
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
        // Add sample user based on factories
        // \App\Models\User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Photo::create([
        //     'title' => 'Picture of a Cat',
        //     'tags' => 'Cat,Animal',
        //     'description' => 'lorem ipsum'
        // ]);

        // Photo::create([
        //     'title' => 'Picture of a Dog',
        //     'tags' => 'Dog,Animal',
        //     'description' => 'lorem ipsum pusam'
        // ]);

        $user = User::factory()->create(['name'=>'Brandon', 'email'=>'brandon@gmail.com']);

        Photo::factory(5)->create([
            'user_id' =>$user->id
        ]);

        
    }
}
