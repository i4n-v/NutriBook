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
        $names = [
            "Ranieri Valença de Carvalho",
            "Francisco Neto de Farias",
            "Maria Isabel de Souza",
            "Antônio Carlos Neto",
            "Carol Santos Lima",
            "Liliane Alves do Nascimento Sales",
            "Leandro Ribeiro da Silva",
            "Cristiano Ronaldo",
            "Beatriz Tavares",
            "Ana Maria de Oliveira "
        ];

        for($i = 1; $i <= 10; $i++){
            User::factory(1)->create([
                'name' => $names[$i-1],
                'email' => "user$i@gmail.com"
            ]); 
        }
    }
}
