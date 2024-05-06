<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id'           => 1,
                'first_name'   => 'Kirti',
                'last_name'    => 'Deshwal',
                'email'        => 'kirtideshwal43@gmail.com',
                'password'     => Hash::make('welcome@123'),
                'slug'         => Str::slug('kirtideshwal43@gmail.com')
            ],
            [
                'id'           => 2,
                'first_name'   => 'Aarti',
                'last_name'    => 'Salaria',
                'email'        => 'aartisalaria96@gmail.com',
                'password'     => Hash::make('welcome@123'),
                'slug'         => Str::slug('aartisalaria96@gmail.com')
            ]
        ]);
    }
}
