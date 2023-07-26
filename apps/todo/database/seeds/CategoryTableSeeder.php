<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
              'name' => '総合',
            ],
            [
              'name' => '日常',
            ],
            [
              'name' => '仕事',
            ],
            [
              'name' => '恋愛',
            ],
            [
              'name' => '学校',
            ],
        ]);
    }
}
