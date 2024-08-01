<?php

namespace Database\Factories;

use App\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countries = Country::all()->pluck('iso')->toArray();
        if (empty($countries)) {
            $countries[0] = Country::factory()->create()->iso;
        }

        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->firstName,
            'username' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'country_iso' => $this->faker->randomElement($countries),
            'twitter'=>$this->faker->userName,
            'website'=>$this->faker->url,
            'bio'=>$this->faker->text,
            'avatar_path'=>'avatars/default.png',
            'provider'=>$this->faker->randomElement(['facebook','google','github']),
            'privacy'=>true,
            'receive_emails'=>true,
            'consent_given_at'=>\Carbon\Carbon::now(),
            'magic_key'=>$this->faker->randomNumber(6)

        ];
    }
}
