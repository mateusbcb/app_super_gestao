<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddRelacionamentoFornecedoresToProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // criando a coluna em produtos que irá receber a FK de fornecedores
        Schema::table('produtos', function (Blueprint $table) {
            // se a tabela já possuir conteúdo inserir um conteúdo para não gerar erro, 
            // pois seria gerado valor padão 0 (zero) e não teria um id relacionado correspondente.
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'fornecedor Padrão',
                'site' => 'fornecedorpadrao.com.br',
                'uf' => 'SP',
                'email' => 'contato@fornecedorpadrao.com.br',
            ]);

            // fazer somente essas duas linhas caso a tabela não possua conteúdo
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id'); // valor defaoult só esta ai pois a tabela não esta vazia
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            // Foreign - tabela_coluna_foreign
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
