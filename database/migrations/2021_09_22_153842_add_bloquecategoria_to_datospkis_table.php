<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBloquecategoriaToDatospkisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datospkis', function (Blueprint $table) {
            $table->integer('bloquecategoria')->nullable()->after('categoriaspki_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datospkis', function (Blueprint $table) {
            $table->dropColumn('bloquecategoria');
        });
    }
}
