<?php

namespace Database\Seeders;

use App\Models\Step;
use App\Models\StepAndImage;
use App\Models\StepImage;
use Illuminate\Database\Seeder;

class StepAndImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Exception
     */
    public function run(): void
    {
        $steps = Step::all();
        $images = StepImage::all();
        if (sizeof($steps) > 0 && sizeof($images) > 0) {
            foreach ($steps as $step) {
                $videoNumber = random_int(1, 5);
                $randomImages = fake()->randomElements($images, $videoNumber);
                foreach ($randomImages as $image) {
                    StepAndImage::query()->create([
                        "step_id" => $step->id,
                        "step_image_id" => $image->id
                    ]);
                }
            }
        }
    }
}
