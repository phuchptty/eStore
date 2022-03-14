<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Phuc',
            'middle_name' => 'Hoang',
            'last_name' => 'Dang',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'mobile' => '0123456789',
            'admin' => 1,
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
    }
}
