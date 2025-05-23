<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $users = [
            [
                'name' => 'Super Administrador',
                'email' => 'superadmin@tm.cupet.cu',
                'password' =>'pkitm2021',
            ],
            [
                'name' => 'Administrador',
                'email' => 'admin@tm.cupet.cu',
                'password' => 'pkitm2021',
            ],
            /*[
                'name' => 'Usuario',
                'email' => 'usuario@tm.cupet.cu',
                'password' => '12345',
            ],
            [
                'name' => 'Cliente',
                'email' => 'cliente@tm.cupet.cu',
                'password' => '12345',
            ],*/
        ];

        /*foreach ($users as $user)
        {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt($user['password'])
            ]);
        }*/

        /*
         * Ejemplo segun CodersFree crear Roles y Permisos
         * User::create([
            'name' => 'Super Administrador',
            'email' => 'superadmin@tm.cupet.cu',
            'password' => bcrypt('123456')
        ])->assignRole('SuperAdmin');
        User::factory(9)->create();
        */

        //User::factory(30)->create();
    }
}
