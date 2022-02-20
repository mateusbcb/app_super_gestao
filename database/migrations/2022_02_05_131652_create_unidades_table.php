<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });

        // adicionar relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // adicionar relacionamento com a tabela produto_detalhe
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // para remover essa tabela precisa ANTES remover os relacinamentos de forma inverça da criação
        // remover o relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            // remover o FK
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //[tabela]_[coluna]_foreign
            // remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        // remover o relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            // remover o FK
            $table->dropForeign('produtos_unidade_id_foreign'); //[tabela]_[coluna]_foreign
            // remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        // remove tabela
        Schema::dropIfExists('unidades');
    }
}
