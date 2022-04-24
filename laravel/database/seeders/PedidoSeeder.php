<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            'cliente' => 1,
            'produto' => 'Ração p/ filhote',
            'numero' => 1,
            'status' => 'Em andamento',
            'quantidade' => 2,
        ]);
    }
}
