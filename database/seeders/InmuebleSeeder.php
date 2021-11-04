<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inmueble;
use App\Models\Image;


class InmuebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inmuebles = Inmueble::factory(15)->create();
        
        foreach($inmuebles as $inmueble){
        
           Image::factory(6)->create([
            
            'imageable_id' => $inmueble->id,
            'imageable_type' => Inmueble::class
           
           ]);
        }
    }
}
