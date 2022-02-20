<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();

        $fornecedor->nome   = 'Fornecedor 100';
        $fornecedor->site   = 'fornecedor100.com.br';
        $fornecedor->uf     = 'SP';
        $fornecedor->email  = 'contato@fornecedor100.com.br';

        $fornecedor->save();

        // ou

        // necessário ter no Model o private $fillable = ['nome', 'site', 'uf', 'email'];
        Fornecedor::create([
            'nome'  => 'Fornecedor 200',
            'site'  => 'fornecedor200.com.br',
            'uf'    => 'MG',
            'email' => 'contato@fornecedor200.com.br',
        ]);

        // ou

        // insert
        
        DB::table('fornecedores')->insert([
            'nome'  => 'Fornecedor 300',
            'site'  => 'fornecedor300.com.br',
            'uf'    => 'SC',
            'email' => 'contato@fornecedor300.com.br',
        ]);
    }
}
