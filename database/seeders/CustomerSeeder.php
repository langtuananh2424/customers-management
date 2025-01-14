<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            $password = $faker->password();
            $hashedPassword = Hash::make($password);
            Customer::create([
                'email' => $faker->unique()->safeEmail,
                'password' => $hashedPassword,
                'status' => $faker->randomElement(['active', 'inactive', 'banned']),
                'account_type' => $faker->randomElement(['basic', 'premium', 'enterprise']),
                'last_login' => $faker->dateTimeBetween('-1 months', 'now'),
            ]);
        }
    }
}
