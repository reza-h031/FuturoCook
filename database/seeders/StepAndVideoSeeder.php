<?php

namespace Database\Seeders;

use App\Models\Step;
use App\Models\StepAndVideo;
use App\Models\StepVideo;
use Illuminate\Database\Seeder;

class StepAndVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $steps = Step::all();
        $videos = StepVideo::all();
        if (sizeof($steps) > 0 && sizeof($videos) > 0) {
            foreach ($steps as $step) {
                $videoNumber = random_int(1, 5);
                $randomVideos = fake()->randomElements($videos, $videoNumber);
                foreach ($randomVideos as $video) {
                    StepAndVideo::query()->create([
                        "step_id" => $step->id,
                        "step_video_id" => $video->id
                    ]);
                }
            }
        }
    }
}
