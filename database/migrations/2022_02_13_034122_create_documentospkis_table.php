<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentospkisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentospkis', function (Blueprint $table) {
            $table->id();
            $table->string('documentopki');
            $table->unsignedBigInteger('datospki_id');
            $table->foreign('datospki_id')->references('id')->on('datospkis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentospkis');
    }
}
