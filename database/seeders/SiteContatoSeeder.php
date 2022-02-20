<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $contato = new SiteContato();

        // $contato->nome              = 'Sistema SG';
        // $contato->telefone          = '(11) 9999-8888';
        // $contato->email             = 'contato@sg.com';
        // $contato->motivo_contato    = 1;
        // $contato->mensagem          = 'Seja bem-vindo(a) ao sistema Super Gestão';

        // $contato->save();

        SiteContato::Factory(100)->create();
    }
}
