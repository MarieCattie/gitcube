<?php

namespace Database\Seeders;

use App\Models\Repository;
use App\Models\RepositoryFolder;
use App\Models\User;
use Database\Factories\UserFactory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Мария',
            'surname' => 'Неустроева',
            'email' => 'mashalena123@mail.ru',
            'password' => '123',
            'login' => 'MarieCattie'
        ]);

        User::create([
            'name' => 'Николай',
            'surname' => 'Шиленко',
            'email' => 'sh@bk.ru',
            'password' => '123',
            'login' => 'Krekcr'
        ]);

        User::create([
            'name' => 'Лёха',
            'surname' => 'Лёхович',
            'email' => 'exm@a.ru',
            'password' => '123',
            'login' => 'Lenin'
        ]);

        DB::table('friends')->insert([
            'first_id' => 1,
            'second_id' => 2,
            'type' => 0
        ]);

        User::factory(10)->create();
        Repository::factory(10)->create();

        for ($i = 1; $i < 11; $i++) {
            RepositoryFolder::create([
                'title' => '.main',
                'main' => 1,
                'repository_id' => $i
            ]);
        }


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//        UserFactory::factory(30)->create();
    }
}
