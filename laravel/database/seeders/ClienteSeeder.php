<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome' => 'Carlos Pereira',
            'cpf' =>'417.587.268-01',
            'email' =>'seuemail@gmail.com',
        ]);
    }
}
