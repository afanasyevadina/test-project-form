<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Factories\CsvSaverFactory;
use App\Models\Factories\JsonSaverFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Application::factory(25)->create();
        foreach (Application::all()->map(function ($item) {
            return $item->only(['name', 'phone', 'message']);
        })->toArray() as $application) {
            (new JsonSaverFactory())->getSaver()->save($application);
            (new CsvSaverFactory())->getSaver()->save($application);
        }
    }
}
