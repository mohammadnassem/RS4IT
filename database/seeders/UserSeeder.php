<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = Collection::make([
            [
                'id' => 1,
                'name' => 'admin1',
                'email' => 'admin1@company.com',
                'password' => bcrypt('123456789'),
            ],

            [
                'id' => 2,
                'name' => 'admin2',
                'email' => 'admin2@company.com',
                'password' => bcrypt('123456789'),
            ],

        ]);

        $users->each(function ($user) {
            User::create($user);
        });
    }
}
