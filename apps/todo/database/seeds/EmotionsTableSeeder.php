<?php

use Illuminate\Database\Seeder;
use App\Models\Emotion;

class EmotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emotions')->insert([
            [
              'code' => '1f4a8',
            ],
            [
              'code' => '1f97a',
            ],
            [
              'code' => '1f642',
            ],
            [
              'code' => '1f605',
            ],
            [
              'code' => '1f633',
            ],
            [
              'code' => '1f973',
            ],
        ]);
    }
}
