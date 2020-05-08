<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Wilker',
            'email' => 'wilker-22@outlook.com',
            'password' => bcrypt('bends')
        ]);
    }
}
