<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomFieldsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('custom_fields')->delete();
        
        \DB::table('custom_fields')->insert(array (
            0 => 
            array (
                'id' => 1,
                'created_at' => '2025-06-11 07:08:42',
                'updated_at' => '2025-06-11 07:08:42',
                'name' => 'pledged_signatures',
                'type' => 'text',
                'label' => '{"de":"Anzahl versprochener Unterschriften","fr":"Nombre de signatures promises"}',
            ),
        ));
        
        
    }
}