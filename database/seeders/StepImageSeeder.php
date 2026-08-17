<?php

namespace Database\Seeders;

use App\Models\StepImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StepImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StepImage::factory(Utils::STEP_IMAGE)->create();
    }
}
