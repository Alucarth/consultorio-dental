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
            'email' => 'yovis@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
