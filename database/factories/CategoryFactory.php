<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url_key'          => Str::random(10),
            'image'            => 'resources/img/unnamed.png',
            'name'             => Str::random(10),
            'description'      => Str::random(10),
            'meta_description' => Str::random(50),
         ];
    }
}
