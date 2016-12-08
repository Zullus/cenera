<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'type' => 'Cliente',
        ]);

        DB::table('types')->insert([
            'type' => 'Contrario',
        ]);

        DB::table('types')->insert([
            'type' => 'Judicial',
        ]);

        DB::table('types')->insert([
            'type' => 'Extrajudicial',
        ]);

        DB::table('types')->insert([
            'type' => 'Letrado',
        ]);

        DB::table('types')->insert([
            'type' => 'Procurador',
        ]);

        DB::table('types')->insert([
            'type' => 'Tecero',
        ]);

        DB::table('types')->insert([
            'type' => 'Usuario, Letrado',
        ]);

    }
}
