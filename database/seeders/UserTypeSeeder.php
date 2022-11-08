<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create(['id' => UserType::ADULT, 'name' => 'Adulte']);
        UserType::create(['id' => UserType::YOUNG, 'name' => 'Jeune']);
        UserType::create(['id' => UserType::CHILD, 'name' => 'Enfant']);
    }
}
