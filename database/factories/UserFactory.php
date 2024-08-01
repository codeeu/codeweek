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
            'firstname' => $faker->firstName,
            'lastname' => $faker->firstName,
            'username' => $faker->firstName,
            'email' => $faker->unique()->safeEmail,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'country_iso' => $faker->randomElement($countries),
            'twitter'=>$faker->userName,
            'website'=>$faker->url,
            'bio'=>$faker->text,
            'avatar_path'=>'avatars/default.png',
            'provider'=>$faker->randomElement(['facebook','google','github']),
            'privacy'=>true,
            'receive_emails'=>true,
            'consent_given_at'=>\Carbon\Carbon::now(),
            'magic_key'=>$faker->randomNumber(6)

        ];
    }
}
