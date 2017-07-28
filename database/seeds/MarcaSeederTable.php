<?php

use Illuminate\Database\Seeder;

class MarcaSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $marcas = [[
            'abreviatura' => 'VW',
            'name' => 'Volkswagen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'BMW',
            'name' => 'BMW',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Fiat',
            'name' => 'Fiat',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Chevy',
            'name' => 'Chevrolet',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Audi',
            'name' => 'Audi',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Ford',
            'name' => 'Ford',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Citroën',
            'name' => 'Citroën',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Ferrari',
            'name' => 'Ferrari',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Honda',
            'name' => 'Honda',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Hyundai',
            'name' => 'Hyundai',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Toyota',
            'name' => 'Toyota',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Kia',
            'name' => 'Kia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Lada',
            'name' => 'Lada',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Mazda',
            'name' => 'Mazda',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Mercedes',
            'name' => 'Mercedes',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],[
            'abreviatura' => 'Pegeout',
            'name' => 'Pegeout',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]];
        DB::table('marcas')->insert($marcas);
    }
}
