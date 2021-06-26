<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<=10; $i++){
            User::factory(1)->create([
                'email' => "usuario$i@gmail.com"
            ]); 
        }
    }
}
