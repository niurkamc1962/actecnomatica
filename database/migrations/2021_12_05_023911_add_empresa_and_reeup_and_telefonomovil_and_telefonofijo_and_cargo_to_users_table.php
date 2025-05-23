<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmpresaAndReeupAndTelefonomovilAndTelefonofijoAndCargoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('empresa')->nullable()->after('profile_photo_path');
            $table->integer('reeup')->nullable()->after('empresa');
            $table->text('telefonomovil')->nullable()->after('reeup');
            $table->text('telefonofijo')->nullable()->after('telefonomovil');
            $table->text('cargo')->nullable()->after('telefonofijo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
