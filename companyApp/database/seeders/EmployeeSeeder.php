<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10000) as $index) {
            Employee::create([
                'emp_code' => 'EMP' . str_pad($index, 4, '0', STR_PAD_LEFT),
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'department' => $faker->randomElement(['HR', 'IT', 'Finance', 'Sales']),
                'designation' => $faker->jobTitle,
                'salary' => $faker->randomFloat(2, 25000, 90000),
            ]);
        }
    }
}

