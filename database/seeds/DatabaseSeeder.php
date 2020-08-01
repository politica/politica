<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create();

        factory(\App\Category::class, 3)->create()->each(function (\App\Category $category) {
            factory(\App\Test::class, 5)->create([
                'category_id' => $category->id,
            ])->each(function (\App\Test $test) {
                factory(\App\Question::class, 10)->create([
                    'test_id' => $test->id,
                ])->each(function (\App\Question $question) {
                    factory(\App\Answer::class, 5)->create([
                        'question_id' => $question->id,
                    ]);
                });
            });
        });
    }
}
