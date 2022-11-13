<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Repository;
use App\Models\RepositoryFolder;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RepositoryFolder>
 */
class RepositoryFolderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            'title' => $this->faker->word,
            'main' => $main,
            'repository_folder' => $this->faker->unique()->randomElement($repositories->lists('id')),
            'folder_id' => $folder_id
        ];
    }
}
