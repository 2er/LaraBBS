<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\User;
use App\Models\Category;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        // 获取Faker对象
        $faker = app(Faker\Generator::class);

        // 获取所有用户ID
        $user_ids = User::all()->pluck('id')->toArray();

        // 获取所有分类ID
        $category_ids = Category::all()->pluck('id')->toArray();

        $topics = factory(Topic::class)
            ->times(100)
            ->make()
            ->each(function ($topic, $index) use ($user_ids, $category_ids, $faker) {
                $topic->user_id = $faker->randomElement($user_ids);
                $topic->category_id = $faker->randomElement($category_ids);
            });

        Topic::insert($topics->toArray());
    }

}

