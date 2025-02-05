<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookIssue>
 */
class BookIssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>User::inRandomOrder()->first()->id,
            'book_id' => Book::inRandomOrder()->first()->id,
            'requested_date' => $this->faker->dateTime(),
            'issue_status' => 'requested'
        ];
    }
}
