<?php

namespace Database\Factories;
// database/factories/DepartmentFactory.php
// database/factories/DepartmentFactory.php

use App\Models\Department;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    protected $model = Department::class;

    public function definition()
    {
        return [
            'department' => $this->faker->company, // Generate a random company name
            // Add more fields if necessary
        ];
    }
}

