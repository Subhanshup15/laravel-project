<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = Faker::create();

        foreach (range(1, 10000) as $index) {
            Department::create([
                'department' => $faker->randomElement(['HR', 'IT', 'Finance', 'Sales']), 
            ]);
        }
    }
}
