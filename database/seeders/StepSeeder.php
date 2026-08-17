<?php

namespace Database\Seeders;

use App\Models\Step;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class StepSeeder extends Seeder
{
    private const MIN_STEPS = 3;
    private const MAX_STEPS = 20;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Step::factory(Utils::STEP_NUMBER)->create();
    }
}
