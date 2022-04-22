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
            'cliete' => 'Carlos Pereira',
            'produto' => 'Ração p/ filhote',
            'numero' => 1,
            'quantidade' => 2,
        ]);
    }
}
