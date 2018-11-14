<?php

use Illuminate\Database\Seeder;

class UsuariosPorDefecto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'id_odontologo' => 0,
            'rol' => 0,
        ]);
    }
}
