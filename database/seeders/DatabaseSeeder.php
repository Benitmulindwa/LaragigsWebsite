<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create();
        $user=User::factory()->create([
            'name'=>'John Doe',
            'email'=>'john@gmail.com'
        ]);
        Listing::factory(6)->create([
            'user_id'=>$user->id()
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Listing::create([
        //     'title'=>'Laravel developer',
        //     'tags'=>'laravel, programming,job,fulltime',
        //     'company'=>'Kazi+',
        //     'location'=>'Nairobi, Kenya',
        //     'email'=>'kaziplus@work.com',
        //     'website'=>'www.kaziplus.com',
        //     'description'=>'We are seeking a talented and 
        //         experienced Laravel Developer to join our 
        //         development team. As a Laravel Developer, 
        //         you will be responsible for designing, 
        //         developing, and maintaining high-quality web 
        //         applications using the Laravel framework. 
        //         You will collaborate with cross-functional teams, 
        //         including designers and other developers, 
        //         to create robust and scalable solutions.'
        // ]);
        // Listing::create(['title'=>'Laravel developer Intern',
        // 'tags'=>'laravel, programming,intern ,remote',
        // 'company'=>'Kazi+',
        // 'location'=>'Nairobi, Kenya',
        // 'email'=>'kaziplus@internteam.com',
        // 'website'=>'www.kaziplus.com',
        // 'description'=>'We are seeking a motivated and 
        //                 talented intern to join our development team as 
        //                 a Laravel Developer Intern. This internship 
        //                 provides an excellent opportunity to gain 
        //                 hands-on experience in web application 
        //                 development using the Laravel framework. 
        //                 As a Laravel Developer Intern, you will work 
        //                 closely with our experienced developers, learn best 
        //                 practices, and contribute to real-world projects.']);
    }
}
