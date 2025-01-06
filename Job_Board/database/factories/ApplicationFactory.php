<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\User;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Application::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), //para criar um novo candidato
            'job_id' => Job::factory(), //para criar uma nova vaga
        ];
    }
}
