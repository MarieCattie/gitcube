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


        User::factory(10)->create();
        Repository::factory(10)->create();

        $repIds = Repository::all()->pluck('id')->toArray();


        for($i = 0; $i < count($repIds); $i++)
        {

            RepositoryFolder::create([
                'title' => '.main',
                'main' => 1,
                'repository_id' => $repIds[$i],
                'folder_id' => null
            ]);

        }

        // RepositoryFolder::factory(10)->create();


        User::create([
            'name' => 'Nikolay',
            'surname' => 'Shilenko',
            'email' => 'sh@bk.ru',
            'password' => 'root',
            'login' => 'krekcr',
            'power' => 4
        ]);

//        UserFactory::factory(30)->create();
    }
}
