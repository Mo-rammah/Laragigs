<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\listing;
use App\Models\User;
use Database\Factories\listingFactory;
use GuzzleHttp\Promise\Create;
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
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = User::factory()->Create([
            'name'=>'john doe',
            'email' => 'john@gmail.com'
        ]);

        Listing::factory(20)->create([
            'user_id' => $user->id
        ]);

        // listing::create([
        //     'title'=>'this is listing one',
        //     'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus blandit et risus quis scelerisque. Suspendisse eros erat, tempor eu tempus sed, tincidunt non orci. Duis eu cursus nisi. Suspendisse sit amet orci tortor. Sed tempus gravida eros. Maecenas eget viverra ipsum. Etiam eleifend scelerisque erat ac iaculis. Proin pharetra orci sed erat scelerisque maximus eu ac risus. Sed sapien ex, dignissim eget volutpat sit amet, vehicula ultricies neque. Sed placerat ultrices enim, vel ultrices leo scelerisque et. Morbi bibendum dignissim placerat. Nunc congue sed purus sed tincidunt. Praesent ac urna vel metus convallis accumsan in in justo. Donec sit amet eleifend purus. ',
        //     'company'=>'Boston inc',
        //     'tags'=>'placeholder,tags,dude',
        //     'location'=>'placeholder location',
        //     'email'=>'placeholder e-mail',
        //     'website'=>'placeholder website',
        // ]);
        // listing::create([
        //     'title'=>'this is listing two',
        //     'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus blandit et risus quis scelerisque. Suspendisse eros erat, tempor eu tempus sed, tincidunt non orci. Duis eu cursus nisi. Suspendisse sit amet orci tortor. Sed tempus gravida eros. Maecenas eget viverra ipsum. Etiam eleifend scelerisque erat ac iaculis. Proin pharetra orci sed erat scelerisque maximus eu ac risus. Sed sapien ex, dignissim eget volutpat sit amet, vehicula ultricies neque. Sed placerat ultrices enim, vel ultrices leo scelerisque et. Morbi bibendum dignissim placerat. Nunc congue sed purus sed tincidunt. Praesent ac urna vel metus convallis accumsan in in justo. Donec sit amet eleifend purus. ',
        //     'company'=>'Boston inc2',
        //     'tags'=>'placeholder,tags2,dude',
        //     'location'=>'placeholder location2',
        //     'email'=>'placeholder e-mail2',
        //     'website'=>'placeholder website2',
        // ]);
    }
}
