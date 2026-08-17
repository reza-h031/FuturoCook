<?php

namespace Database\Seeders;

use App\Models\StepVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StepVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StepVideo::factory(Utils::STEP_VIDEO)->create();
    }
}
